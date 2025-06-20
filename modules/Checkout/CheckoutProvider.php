<?php

namespace Modules\Checkout;

use Illuminate\Support\ServiceProvider;
use Modules\Checkout\Http\Clients\BinanceApiClient;
use Modules\Checkout\Http\Clients\CoinbaseApiClient;
use Modules\Checkout\Interfaces\ApiClientInterface;
use Modules\Checkout\Interfaces\CheckoutServiceInterface;
use Modules\Checkout\Services\BinanceCheckoutService;
use Modules\Checkout\Services\CoinbaseCheckoutService;

class CheckoutProvider extends ServiceProvider
{
    /**
     * Register services.
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
                $this->app->bind(CheckoutServiceInterface::class, BinanceCheckoutService::class);
                $this->app->bind(ApiClientInterface::class, BinanceApiClient::class);
                break;
            default:
                // Default to Coinbase if no specific exchange is set
                $this->app->bind(CheckoutServiceInterface::class, CoinbaseCheckoutService::class);
                $this->app->bind(ApiClientInterface::class, CoinbaseApiClient::class);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
