<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

$version = 'v1';
Route::prefix($version)->group(function () {
    // add auth middleware if needed. e.g. 'auth:api'
    Route::middleware([])->group(function () {
        Route::post('/checkout', CheckoutController::class);
        Route::post('/webhook', WebhookController::class);
    });
});