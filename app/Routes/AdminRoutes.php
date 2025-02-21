<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    AdminStyleController,
    BlockController,
    PagesController,
};
use App\Http\Controllers\Custom\{
    AttributesController,
    CategoryController,
    ItemController,
    MediaController,
};
use App\Http\Middleware\EnsureUserIsApproved;
use App\Http\Middleware\SetLanguage;
use App\Http\Middleware\EnsureUserRoleIsSufficient;

class AdminRoutes
{
    /**
     * Registers all routes that were previously
     * defined in a procedural way (require_once).
     *
     * @return void
     */
    public static function register(): void
    {
        // Group routes for authenticated and approved users
        Route::middleware(['auth', SetLanguage::class, EnsureUserIsApproved::class])
            ->prefix('admin')
            ->group(function () {

                // Middleware for roles
                Route::middleware([EnsureUserRoleIsSufficient::class . ':programmer'])->group(function () {

                    /**
                     * Admin Logs
                     */
                    Route::get('/logs', [AdminController::class, 'logs'])->name('logs');

                    /**
                     * Block Management
                     */
                    Route::resource('/blocks', BlockController::class)
                         ->except(['show'])
                         ->parameters(['blocks' => 'block']);
                    Route::get('/blocks/create', [BlockController::class, 'form'])->name('blocks.form.create');
                    Route::get('/blocks/{block}/form', [BlockController::class, 'form'])->name('blocks.form.edit');
                    Route::post('/blocks/update-order', [BlockController::class, 'updateOrder'])->name('blocks.updateOrder');
                    Route::delete('/blocks/delete-photo/{block}/{image}', [BlockController::class, 'deletePhoto'])->name('blocks.deletePhoto');

                    /**
                     * Style Management
                     */
                    Route::get('/style', [AdminStyleController::class, 'edit'])->name('style.edit');
                    Route::post('/style', [AdminStyleController::class, 'update'])->name('style.update');

                    /**
                     * Pages Management
                     */
                    Route::resource('/pages', PagesController::class)
                         ->except(['show'])
                         ->parameters(['pages' => 'page']);
                    Route::get('/pages/create', [PagesController::class, 'form'])->name('pages.form.create');
                    Route::get('/pages/{page}/form', [PagesController::class, 'form'])->name('pages.form.edit');
                });

                /**
                 * Admin Dashboard and User Management
                 */
                Route::get('', [AdminController::class, 'dashboard'])->name('dashboard');
                Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.update');
                Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
                Route::patch('/users/{user}/approve', [AdminController::class, 'approveUser'])->name('users.approve');
                Route::post('/users/create', [AdminController::class, 'createUser'])->name('users.create');

                /**
                 * Admin Profile
                 */
                Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
                Route::post('/admin/update-name', [AdminController::class, 'updateName'])->name('admin.update-name');
                Route::post('/admin/update-email', [AdminController::class, 'updateEmail'])->name('admin.update-email');
                Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');
                Route::post('/admin/check-password', [AdminController::class, 'checkCurrentPassword'])->name('admin.check-password');

                /**
                 * Items Management
                 */
                Route::resource('/items', ItemController::class)
                     ->except(['show'])
                     ->parameters(['items' => 'item']);
                Route::get('/items/create', [ItemController::class, 'form'])->name('items.form.create');
                Route::get('/items/{item}/form', [ItemController::class, 'form'])->name('items.form.edit');
                Route::delete('/items/photos/{photo}', [MediaController::class, 'destroy'])->name('items.photos.destroy');
                Route::delete('/items/thumbnails/{thumbnail}', [MediaController::class, 'destroyThumbnails'])->name('items.thumbnails.destroy');

                /**
                 * Categories Management
                 */
                Route::resource('/categories', CategoryController::class)
                     ->except(['show'])
                     ->parameters(['categories' => 'category']);
                Route::get('/categories/create', [CategoryController::class, 'form'])->name('categories.form.create');
                Route::get('/categories/{category}/form', [CategoryController::class, 'form'])->name('categories.form.edit');
                Route::delete('/categories/{category}/thumbnail', [CategoryController::class, 'destroyLocalitaThumbnail'])->name('general.thumbnail.destroy');

                /**
                 * Attributes Management
                 */
                Route::resource('/attributes', AttributesController::class)
                     ->except(['show'])
                     ->parameters(['attributes' => 'attribute']);
                Route::get('/attributes/create', [AttributesController::class, 'form'])->name('attributes.form.create');
                Route::get('/attributes/{attribute}/form', [AttributesController::class, 'form'])->name('attributes.form.edit');

                Route::delete('/attributes/delete-macro-category/{macroCategory}', [AttributesController::class, 'deleteAttributeCategory'])->name('attributes.deleteAttributeCategory');
                Route::post('/attributes/save-macro-category', [AttributesController::class, 'storeAttributeCategory'])->name('attributes.storeAttributeCategory');
                Route::get('/attributes/macro-category/{macroCategory}/edit', [AttributesController::class, 'formAttributeCategory'])->name('attributes.editAttributeCategory');
                Route::get('/attributes/macro-category/create', [AttributesController::class, 'formAttributeCategory'])->name('attributes.createAttributeCategory');
                Route::put('/attributes/macro-category/{macroCategory}/update', [AttributesController::class, 'updateAttributeCategory'])->name('attributes.updateAttributeCategory');
                Route::delete('/attributes/{attribute}', [AttributesController::class, 'delete'])->name('attributes.delete');

                /**
                 * Category Types Management
                 */
                Route::get('/category-types/{type}/edit', [CategoryController::class, 'formCategoryType'])->name('category-types.edit');
                Route::get('/category-types/create', [CategoryController::class, 'formCategoryType'])->name('category-types.create');
                Route::post('/category-types/save', [CategoryController::class, 'storeCategoryType'])->name('category-types.store');
                Route::put('/category-types/{type}/update', [CategoryController::class, 'updateCategoryType'])->name('category-types.update');
                Route::delete('/category-types/{type}/delete', [CategoryController::class, 'deleteCategoryType'])->name('category-types.delete');
                Route::delete('/category-types/{type}/thumbnail', [CategoryController::class, 'destroyThumbnailCategoryType'])->name('categoryTypes.thumbnail.destroy');

            });
    }
}
