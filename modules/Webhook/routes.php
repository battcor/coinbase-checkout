<?php

use Modules\Webhook\Http\Controllers\WebhookController;

$version = 'v1';
Route::prefix("api/{$version}")->group(function () {
    // add auth middleware if needed. e.g. 'auth:api'
    Route::middleware([])->group(function () {
        Route::post('/webhook', WebhookController::class);
    });
});