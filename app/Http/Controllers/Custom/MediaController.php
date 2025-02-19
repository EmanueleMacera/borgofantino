<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\ItemMedia;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Delete an existing media file (photo or thumbnail).
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $media = ItemMedia::findOrFail($id);

        try {
            Storage::delete('public/' . $media->path);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(__('general.error_deleting', ['error' => $e->getMessage()]));
        }

        $media->delete();

        return redirect()->back()->with('success', __('general.deleted_successfully'));
    }
}
