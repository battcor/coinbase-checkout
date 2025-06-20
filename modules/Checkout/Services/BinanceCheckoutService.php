<?php

namespace Modules\Checkout\Services;

use Illuminate\Support\Facades\Log;
use Modules\Checkout\Interfaces\CheckoutServiceInterface;

class BinanceCheckoutService extends ExchangeService implements CheckoutServiceInterface
{
    protected const EXCHANGE_NAME = 'binance';

    /**
     * @inheritDoc
     */
    public function checkout(float $amount): string
    {
        try {
            // call Binance API to create a checkout session
            $response = $this->apiClient->send([
                'amount' => $amount,
                'description' => 'Test transaction',
            ]);

            if (empty($response['id'])) {
                throw new \Exception('Empty id response from Binance API');
            }
            return $response['id'];
        } catch (\Throwable $th) {
            Log::error('Binance API call failed: ' . $th->getMessage());
            throw $th;
        }
    }
}