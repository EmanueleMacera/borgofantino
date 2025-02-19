<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\CategoryType;
use App\Models\Custom\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'categories';
    const INDEX_ROUTE = '.index';
    const PUBLIC_PATH = 'public/';

    /**
     * Display the list of categories grouped by type.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $types = CategoryType::all();

        $categoriesByType = [];
        foreach ($types as $type) {
            $categoriesByType[] = [
                'type'       => $type,
                'categories' => Category::where('type_id', $type->id)->get(),
            ];
        }

        return view('admin.' . self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, compact('categoriesByType', 'types'));
    }

    /**
     * Show the form to create or edit a category.
     *
     * @param  \App\Models\Custom\Category|null  $category
     * @return \Illuminate\View\View
     */
    public function form(Category $category = null)
    {
        $types = CategoryType::all();
        return view('admin.' . self::GENERIC_SECTION_NAME . '.form_categories', compact('category', 'types'));
    }

    /**
     * Store a **new** category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validateCategoryData($request);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails_cat', 'public');
        }

        Category::create($data);

        $message = __('general.created_successfully');
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Update an **existing** category in the database.
     *
     * @param  \Illuminate\Http\Request       $request
     * @param  \App\Models\Custom\Category    $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $data = $this->validateCategoryData($request);

        if ($request->hasFile('thumbnail')) {

            if ($category->thumbnail) {
                Storage::delete(self::PUBLIC_PATH . $category->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails_cat', 'public');
        }

        $category->update($data);

        $message = __('general.updated_successfully');
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Delete an existing category.
     *
     * @param  \App\Models\Custom\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $category->thumbnail);
        }
        $category->delete();

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', __('general.deleted_successfully'));
    }

    /**
     * Delete the thumbnail of an existing category.
     *
     * @param  \App\Models\Custom\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyThumbnail(Category $category)
    {
        if ($category->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $category->thumbnail);
            $category->update(['thumbnail' => null]);
        }

        return redirect()->back()->with('success', __('general.deleted_successfully'));
    }

    /**
     * Show the form to create or edit a category type.
     *
     * @param  \App\Models\Custom\CategoryType|null  $type
     * @return \Illuminate\View\View
     */
    public function formCategoryType(CategoryType $type = null)
    {
        return view('admin.' . self::GENERIC_SECTION_NAME . '.form_category_type', compact('type'));
    }

    /**
     * Store a **new** category type in the database.
     *
     * @param  \Illuminate\Http\Request           $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCategoryType(Request $request)
    {
        $data = $this->validateCategoryTypeData($request);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('category_type_thumbnails', 'public');
        }

        CategoryType::create($data);

        $message = __('general.created_successfully');
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Update an **existing** category type in the database.
     *
     * @param  \Illuminate\Http\Request             $request
     * @param  \App\Models\Custom\CategoryType      $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategoryType(Request $request, CategoryType $type)
    {
        $data = $this->validateCategoryTypeData($request, $type->id);

        if ($request->hasFile('thumbnail')) {

            if ($type->thumbnail) {
                Storage::delete(self::PUBLIC_PATH . $type->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('category_type_thumbnails', 'public');
        }

        $type->update($data);

        $message = __('general.updated_successfully');
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Delete an existing category type.
     *
     * @param  \App\Models\Custom\CategoryType  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategoryType(CategoryType $type)
    {
        if ($type->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $type->thumbnail);
        }

        $type->delete();

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', __('general.deleted_successfully'));
    }

    /**
     * Delete the thumbnail of an existing category type.
     *
     * @param  \App\Models\Custom\CategoryType  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyThumbnailCategoryType(CategoryType $type)
    {
        if ($type->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $type->thumbnail);
            $type->update(['thumbnail' => null]);
        }

        return redirect()->back()->with('success', __('general.deleted_successfully'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate data for Category creation/update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateCategoryData(Request $request): array
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'type_id'  => 'required|exists:category_types,id',
            'status'   => 'required|in:public,draft',
            'thumbnail'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $validated['slug'] = Str::slug($validated['name'] ?? '');
        return $validated;
    }

    /**
     * Validate data for CategoryType creation/update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $typeId
     * @return array
     */
    private function validateCategoryTypeData(Request $request, int $typeId = null): array
    {
        $uniqueNameRule = 'required|string|max:255|unique:category_types,name';
        if ($typeId) {
            $uniqueNameRule .= ',' . $typeId;
        }

        $validated = $request->validate([
            'name'     => $uniqueNameRule,
            'thumbnail'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name'] ?? '');
        return $validated;
    }
}
