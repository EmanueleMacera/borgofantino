<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class PagesController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'pages';
    const INDEX_ROUTE = '.index';

    /**
     * Display all pages in descending order of creation.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        return view('admin.' . self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, compact('pages'));
    }

    /**
     * Show the form to create or edit a page.
     *
     * @param Page|null $page
     * @return \Illuminate\View\View
     */
    public function form(Page $page = null)
    {
        return view('admin.' . self::GENERIC_SECTION_NAME . '.form', compact('page'));
    }

    /**
     * Store a page in the database (creation only).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validatePageData($request);

        $page = Page::create($validated);
        $message = __('general.created_successfully');

        if ($request->ajax()) {
            return response()->json([
                'success'      => true,
                'redirect_url' => route('blocks.index', ['page_id' => $page->id]),
            ]);
        }

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Update a page in the database (update only).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Page    $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Page $page)
    {
        $validated = $this->validatePageData($request);

        $page->update($validated);
        $message = __('general.updated_successfully');

        if ($request->ajax()) {
            return response()->json([
                'success'      => true,
                'redirect_url' => route('blocks.index', ['page_id' => $page->id]),
            ]);
        }

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', $message);
    }

    /**
     * Delete an existing page from the database.
     *
     * @param  \App\Models\Admin\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
                         ->with('success', __('general.deleted_successfully'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate and prepare page data for creation or update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validatePageData(Request $request): array
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'status' => 'required|in:draft,publish',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $validated['homepage'] = $request->has('homepage') ? 1 : 0;

        return $validated;
    }
}
