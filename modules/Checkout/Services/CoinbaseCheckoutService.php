<?php

namespace Modules\Checkout\Services;

use Illuminate\Support\Facades\Log;
use Modules\Checkout\Interfaces\CheckoutServiceInterface;

class CoinbaseCheckoutService extends ExchangeService implements CheckoutServiceInterface
{
    protected const EXCHANGE_NAME = 'coinbase';

    /**
     * @inheritDoc
     */
    public function checkout(float $amount): string
    {
        try {
            // call Coinbase API to create a checkout session
            $response = $this->apiClient->send([
                'amount' => $amount,
                'description' => 'Test transaction',
            ]);

            if (empty($response['id'])) {
                throw new \Exception('Empty id response from Coinbase API');
            }
            return $response['id'];
        } catch (\Throwable $th) {
            Log::error('Coinbase API call failed: ' . $th->getMessage());
            throw $th;
        }
    }
}