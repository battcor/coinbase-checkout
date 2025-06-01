<?php

namespace App\Services;

use App\Interfaces\ApiClientInterface;

class CoinbaseExchangeService
{
    protected const EXCHANGE_NAME = 'coinbase';

    protected $apiClient;

    public function __construct(ApiClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @inheritDoc
     */
    public function getExchangeName(): string
    {
        return self::EXCHANGE_NAME;
    }
}