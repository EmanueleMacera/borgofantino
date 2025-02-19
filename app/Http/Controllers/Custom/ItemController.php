<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\Item;
use App\Models\Custom\Attribute;
use App\Models\Custom\Category;
use App\Models\Custom\ItemMedia;
use App\Models\Custom\Promozione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'items';
    const INDEX_ROUTE = '.index';
    const PUBLIC_PATH = 'public/';

    /**
     * Display all items with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $items = Item::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.' . self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, compact('items'));
    }

    /**
     * Show the form to create or edit an item.
     *
     * @param  \App\Models\Custom\Item|null  $item
     * @return \Illuminate\View\View
     */
    public function form(Item $item = null)
    {
        $attributes = Attribute::all();
        $categories = Category::with('type')->get();

        return view('admin.' . self::GENERIC_SECTION_NAME . '.form', [
            'item'       => $item,
            'attributes' => $attributes,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a new item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->saveItem($request, new Item());

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
            ->with('success', __('general.created_successfully'));
    }

    /**
     * Update an existing item.
     *
     * @param  \Illuminate\Http\Request      $request
     * @param  \App\Models\Custom\Item       $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        $this->saveItem($request, $item);

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
            ->with('success', __('general.updated_successfully'));
    }

    /**
     * Delete an existing item.
     *
     * @param  \App\Models\Custom\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $item)
    {
        $this->deleteFiles($item);
        $item->delete();

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE)
            ->with('success', __('general.deleted_successfully'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper methods
    |--------------------------------------------------------------------------
    */

    /**
     * Save item data (create or update).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Custom\Item   $item
     * @return void
     */
    private function saveItem(Request $request, Item $item): void
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'description'  => 'nullable|string',
            'status'       => 'required|in:draft,publish',
            'thumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'photos.*'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'attributes'   => 'nullable|array',
            'attributes.*' => 'exists:attributes,id',
            'adress' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'camere' => 'nullable|numeric',
            'bagni' => 'nullable|numeric',
            'posti_letto' => 'nullable|numeric',
            'nei_dintorni' => 'nullable|string',
            'link' => 'nullable|url',
            'promozioni_title.*' => 'nullable|string|max:255',
            'promozioni_description.*' => 'nullable|string',
            'promozioni_photo.*' => 'nullable|image',
        ]);

        $data['slug'] = Str::slug($data['name'] ?? '');

        $item->fill($data)->save();

        if ($request->hasFile('thumbnail')) {
            $this->saveThumbnail($request->file('thumbnail'), $item);
        }

        if ($request->hasFile('photos')) {
            $this->savePhotos($request->file('photos'), $item);
        }

        if ($request->has('attributes')) {
            $item->attributes()->sync($data['attributes']);
        }

        if ($request->has('promozioni_title')) {
            foreach ($request->promozioni_title as $index => $title) {
                $promoData = [
                    'item_id' => $item->id,
                    'title' => $title,
                    'description' => $request->promozioni_description[$index] ?? null,
                ];
                if ($request->hasFile("promozioni_photo") && isset($request->promozioni_photo[$index]) && $request->promozioni_photo[$index]->isValid()) {
                    $promoData['photo'] = $request->promozioni_photo[$index]->store('promozioni_photo', 'public');
                }
                Promozione::create($promoData);
            }
        }
    }

    /**
     * Save thumbnail for an item.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  \App\Models\Custom\Item        $item
     * @return void
     */
    private function saveThumbnail($file, Item $item): void
    {
        if ($item->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $item->thumbnail->path);
            $item->thumbnail->delete();
        }

        $path = $file->store('item_media', 'public');

        ItemMedia::create([
            'item_id' => $item->id,
            'path'    => $path,
            'type'    => 'thumbnail',
        ]);
    }

    /**
     * Save photos for an item.
     *
     * @param  \Illuminate\Http\UploadedFile[]  $files
     * @param  \App\Models\Custom\Item          $item
     * @return void
     */
    private function savePhotos(array $files, Item $item): void
    {
        foreach ($files as $file) {
            if ($file->isValid()) {
                $path = $file->store('item_media', 'public');

                ItemMedia::create([
                    'item_id' => $item->id,
                    'path'    => $path,
                    'type'    => 'photo',
                ]);
            }
        }
    }

    /**
     * Delete associated files for an item (thumbnail + photos).
     *
     * @param  \App\Models\Custom\Item  $item
     * @return void
     */
    private function deleteFiles(Item $item): void
    {
        if ($item->thumbnail) {
            Storage::delete(self::PUBLIC_PATH . $item->thumbnail->path);
            $item->thumbnail->delete();
        }

        if ($item->photos) {
            foreach ($item->photos as $photo) {
                Storage::delete(self::PUBLIC_PATH . $photo->path);
                $photo->delete();
            }
        }
    }
}
