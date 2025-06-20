<?php

namespace Modules;

use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the Checkout module service provider
        $this->app->register(\Modules\Checkout\CheckoutProvider::class);
        $this->app->register(\Modules\Webhook\WebhookProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
