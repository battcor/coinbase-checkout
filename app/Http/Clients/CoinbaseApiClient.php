<?php

namespace App\Http\Clients;

use App\Interfaces\ApiClientInterface;
use Illuminate\Support\Str;

/**
 * Class CoinbaseApiClient
 *
 * This class simulates the behavior of a Coinbase API client for testing purposes.
 * It generates a fake hosted payment URL and charge ID.
 */
class CoinbaseApiClient implements ApiClientInterface
{
    /**
     * @inheritDoc
     */
    public function send(array $data): array
    {
        // mock the response to simulate a successful API call
        return [
            'id' => Str::random(10),
        ];
    }
}
