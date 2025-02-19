<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PublicController;
use App\Http\Middleware\SetLanguage;

class PublicRoutes
{
    /**
     * Register all public routes.
     *
     * @return void
     */
    public static function register(): void
    {
        // Apply the language middleware to all public routes
        Route::middleware([SetLanguage::class])->group(function () {

            // Home Page
            Route::get('/', [PublicController::class, 'showHome'])->name('home');

            // Category Types and Items
            Route::prefix('affitti')->group(function () {
                Route::get('/{categoryTypeSlug}/{name}', [PublicController::class, 'showItem'])->name('public.item.show');
                Route::get('/{categoryTypeSlug}', [PublicController::class, 'showCategoryType'])->name('type.show');
            });

            // Static Content Pages
            Route::get('/{slug}', [PublicController::class, 'showPage'])->name('page.show');
        });
    }
}
