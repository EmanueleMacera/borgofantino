<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Custom\Promozione;
use Illuminate\Support\Facades\Storage;

class PromozioniController extends Controller
{
    /**
     * Elimina una promozione esistente di un rental.
     */
    public function destroy($id)
    {
        $promozione = Promozione::findOrFail($id);

        try {
            if ($promozione->foto) {
                Storage::delete('public/' . $promozione->foto);
            }

            $promozione->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Errore durante l\'eliminazione della promozione: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Promozione eliminata con successo.');
    }
}
