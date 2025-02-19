<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\AttributeCategory;
use App\Models\Custom\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'attributes';
    const INDEX_ROUTE = '.index';

    /**
     * Display a list of macro categories and attributes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $attributeCategories = AttributeCategory::with('attributes')->get();
        return view('admin.' . self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, compact('attributeCategories'));
    }

    /**
     * Show the form for creating or editing a macro category.
     *
     * @param  AttributeCategory|null  $macroCategory
     * @return \Illuminate\View\View
     */
    public function formAttributeCategory(AttributeCategory $macroCategory = null)
    {
        return view('admin.' . self::GENERIC_SECTION_NAME . '.form_attribute_category', compact('macroCategory'));
    }

    /**
     * Store a new macro category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAttributeCategory(Request $request)
    {
        $data = $this->validateCategory($request);

        AttributeCategory::create($data);
        $message = __('general.updated_successfully');

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Update an existing macro category in the database.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\Custom\AttributeCategory  $macroCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAttributeCategory(Request $request, AttributeCategory $macroCategory)
    {
        $data = $this->validateCategory($request);

        $macroCategory->update($data);
        $message = __('general.updated_successfully');

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Delete a macro category from the database.
     *
     * @param  \App\Models\Custom\AttributeCategory  $macroCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAttributeCategory(AttributeCategory $macroCategory)
    {
        $macroCategory->delete();
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', __('general.deleted_successfully'));
    }

    /**
     * Show the form for creating or editing an attribute.
     *
     * @param  \App\Models\Custom\Attribute|null  $attribute
     * @return \Illuminate\View\View
     */
    public function form(Attribute $attribute = null)
    {
        $attributeCategories = AttributeCategory::all();
        return view('admin.' . self::GENERIC_SECTION_NAME . '.form_attribute', compact('attribute', 'attributeCategories'));
    }

    /**
     * Store a new attribute in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validateAttribute($request);

        Attribute::create($data);
        $message = __('general.created_successfully');

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Update an existing attribute in the database.
     *
     * @param  \Illuminate\Http\Request       $request
     * @param  \App\Models\Custom\Attribute  $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Attribute $attribute)
    {
        $data = $this->validateAttribute($request);

        $attribute->update($data);
        $message = __('general.updated_successfully');

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Delete an attribute from the database.
     *
     * @param  \App\Models\Custom\Attribute  $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', __('general.deleted_successfully'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate the data for a category (create / update).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateCategory(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);
    }

    /**
     * Validate the data for an attribute (create / update).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateAttribute(Request $request): array
    {
        return $request->validate([
            'name'                  => 'required|string|max:255',
            'icon'                  => 'nullable|string|max:255',
            'attribute_category_id' => 'required|exists:attribute_categories,id',
        ]);
    }
}
