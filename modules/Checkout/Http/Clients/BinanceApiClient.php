<?php

namespace Modules\Checkout\Http\Clients;

use Illuminate\Support\Str;
use Modules\Checkout\Interfaces\ApiClientInterface;

/**
 * Class BinanceApiClient
 *
 * This class simulates the behavior of a Binance API client for testing purposes.
 * It generates a fake hosted payment URL and charge ID.
 */
class BinanceApiClient implements ApiClientInterface
{
    /**
     * @inheritDoc
     */
    public function send(array $data): array
    {
        // mock the response to simulate a successful API call
        return [
            'id' => Str::uuid(),
        ];
    }
}
