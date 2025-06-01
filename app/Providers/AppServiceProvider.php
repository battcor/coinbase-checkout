<?php

namespace App\Providers;

use App\Http\Clients\CoinbaseApiClient;
use App\Interfaces\ApiClientInterface;
use App\Interfaces\CheckoutServiceInterface;
use App\Services\CoinbaseCheckoutService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * This allows for easy swapping of implementations, such as for testing or
         * using different payment gateways without changing the code that depends on these interfaces.
         */
        switch (config('exchanges.default')) {
            case 'binance':
                // Bind the Binance specific implementations
                break;
            default:
                $this->app->bind(CheckoutServiceInterface::class, CoinbaseCheckoutService::class);
                $this->app->bind(ApiClientInterface::class, CoinbaseApiClient::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
