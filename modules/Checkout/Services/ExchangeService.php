<?php

namespace Modules\Checkout\Services;

use Modules\Checkout\Interfaces\ApiClientInterface;

class ExchangeService
{
    protected const EXCHANGE_NAME = '';

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
        if (empty(static::EXCHANGE_NAME)) {
            // If the exchange name is not defined, throw an exception.
            // This ensures that any subclass must define its own exchange name.
            throw new \Exception('Exchange name is not defined in ' . static::class);
        }
        return static::EXCHANGE_NAME;
    }
}