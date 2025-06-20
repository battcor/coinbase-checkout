<?php

use Modules\Checkout\Http\Controllers\CheckoutController;

$version = 'v1';
Route::prefix("api/{$version}")->group(function () {
    // add auth middleware if needed. e.g. 'auth:api'
    Route::middleware([])->group(function () {
        Route::post('/checkout', CheckoutController::class);
    });
});