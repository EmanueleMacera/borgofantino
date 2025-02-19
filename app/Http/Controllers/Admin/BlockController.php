<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Block;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class BlockController extends Controller
{
    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const GENERIC_SECTION_NAME = 'blocks';
    const INDEX_ROUTE = '.index';

    /**
     * Display a list of blocks associated with a specific page, ordered by the 'order' field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageId = $request->query('page_id');
        $page = Page::with('blocks')->findOrFail($pageId);
        $blocks = $page->blocks()->orderBy('order', 'asc')->get();

        return view('admin.' . self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, compact('page', 'blocks'));
    }

    /**
     * Show the form to create or edit a block.
     * If $blockId is null, we consider creation; otherwise, editing.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $blockId
     * @return \Illuminate\View\View
     */
    public function form(Request $request, ?int $blockId = null)
    {
        $pageId = $request->query('page_id');
        $page = Page::findOrFail($pageId);

        $block = $blockId ? Block::findOrFail($blockId) : new Block();

        $blockTypes = collect(File::files(resource_path('views/blocks')))->map(function ($file) {
            $name = str_replace('.blade.php', '', $file->getFilename());
            return ucfirst(str_replace('_', ' ', $name));
        })->toArray();

        return view('admin.' . self::GENERIC_SECTION_NAME . '.form', compact('block', 'blockTypes', 'page'));
    }

    /**
     * Store a new block in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateBlockData($request);

        $block = new Block();
        $block->fill($data);
        $block->save();

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, ['page_id' => $data['page_id']])
            ->with('success', __('general.created_successfully'));
    }

    /**
     * Update an existing block in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $blockId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $blockId): RedirectResponse
    {
        $data = $this->validateBlockData($request);

        $block = Block::findOrFail($blockId);
        $block->update($data);

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, ['page_id' => $data['page_id']])
            ->with('success', __('general.updated_successfully'));
    }

    /**
     * Delete a block from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Block  $block
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Block $block): RedirectResponse
    {
        $pageId = $request->query('page_id');

        if ((int) $block->page_id !== (int) $pageId) {
            abort(403, __('general.unauthorized_action'));
        }

        $block->delete();

        return redirect()
            ->route(self::GENERIC_SECTION_NAME . self::INDEX_ROUTE, ['page_id' => $pageId])
            ->with('success', __('general.deleted_successfully'));
    }

    /**
     * Update the order of blocks associated with a page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $pageId = $request->input('page_id');
        $blocks = $request->input('blocks');

        $page = Page::find($pageId);
        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => __('general.page_not_found')
            ], 404);
        }

        foreach ($blocks as $order => $id) {
            $block = Block::where('id', $id)
                ->where('page_id', $pageId)
                ->first();

            if ($block) {
                $block->update(['order' => $order]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => __('general.updated_successfully')
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Validate block data for both store and update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateBlockData(Request $request): array
    {
        return $request->validate([
            'title'   => 'nullable|string|max:255',
            'type'    => 'required|string',
            'page_id' => 'required|exists:pages,id',
        ]);
    }
}
