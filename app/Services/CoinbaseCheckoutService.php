<?php

namespace App\Services;

use App\Interfaces\CheckoutServiceInterface;
use Illuminate\Support\Facades\Log;

class CoinbaseCheckoutService extends CoinbaseExchangeService implements CheckoutServiceInterface
{
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