<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Custom\Item;
use App\Models\Custom\CategoryType;
use App\Models\Custom\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a specific page by slug (only  publish).
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function showPage(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        $blocks = $page->blocks()->orderBy('order')->get();

        return view('public.show', compact('page', 'blocks'));
    }

    /**
     * Display the homepage (the first page marked as homepage and  published).
     *
     * @return \Illuminate\View\View
     */
    public function showHome()
    {
        $page = Page::where(column: 'homepage', operator: 1)
            ->where('status', 'publish')
            ->firstOrFail();

        $blocks = $page->blocks()->orderBy('order')->get();

        $items = Item::where('status', 'publish')->sortBy('name');

        return view('public.show', compact('page', 'blocks', 'items'));
    }

    /**
     * Switch the application language if it exists in config('app.available_locales').
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage(Request $request)
    {
        $locale = $request->input('lang');

        if (array_key_exists($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }

    /**
     * Display categories/items by type and categoryType slug.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function showCategoryType(string $slug)
    {
        $categoryType = CategoryType::where('slug', $slug)->firstOrFail();

        $items = Item::whereHas('category', function ($query) use ($categoryType) {
                $query->where('type_id', $categoryType->id);
            })
            ->with(['thumbnail', 'category'])
            ->orderBy('created_at', 'desc')
            ->get();

        $uniqueCategories = $items->pluck('category')->unique('id');

        return view('public.type.show', compact('categoryType', 'items', 'uniqueCategories'));
    }

    /**
     * Display a specific item (item) by slug.
     *
     * @param  string  $type
     * @param  string  $categoryTypeSlug
     * @param  string  $itemSlug
     * @return \Illuminate\View\View
     */
    public function showItem(string $categoryTypeSlug, string $name)
    {
        $item = Item::where('name', $name)
            ->where('status', 'publish')
            ->with([
                'category',
                'itemMedia' => function ($query) {
                    $query->whereIn('type', ['photo', 'thumbnail']);
                },
                'attributes'
            ])
            ->firstOrFail();
    
        return view('public.items.item', compact('item'));
    }
}
