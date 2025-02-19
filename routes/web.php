<?php

use App\Http\Controllers\Admin\AdminStyleController;
use App\Routes\AdminRoutes;
use App\Routes\PublicRoutes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

AdminRoutes::register();
PublicRoutes::register();

Auth::routes([
    'login'    => filter_var(env('AUTH_LOGIN'), FILTER_VALIDATE_BOOLEAN),
    'register' => filter_var(env('AUTH_REGISTER'), FILTER_VALIDATE_BOOLEAN),
    'reset'    => filter_var(env('AUTH_RESET'), FILTER_VALIDATE_BOOLEAN),
    'verify'   => filter_var(env('AUTH_VERIFY'), FILTER_VALIDATE_BOOLEAN),
    'confirm'  => filter_var(env('AUTH_CONFIRM'), FILTER_VALIDATE_BOOLEAN),
]);

Route::get('/style/common-styles', [AdminStyleController::class, 'commonCss'])
     ->name('css.common');
Route::get('/style/custom-styles', [AdminStyleController::class, 'customCss'])
     ->name('css.custom');
