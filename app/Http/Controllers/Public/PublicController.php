<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Custom\Item;
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

        $items = Item::where('status', 'publish')->orderBy('id')->get();

        return view('public.show', compact('page', 'blocks', 'items'));
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

        $items = Item::where('status', 'publish')->orderBy('id')->get();

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
     * Display a specific item (item) by slug.
     *
     * @param  string  $type
     * @param  string  $categoryTypeSlug
     * @param  string  $itemSlug
     * @return \Illuminate\View\View
     */
    public function showItem(string $name)
    {
        $item = Item::where('slug', $name)
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
