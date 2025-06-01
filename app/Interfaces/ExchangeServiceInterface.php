<?php

namespace App\Interfaces;

interface ExchangeServiceInterface
{
    /**
     * Returns the name of the payment exchange/gateway.
     *
     * @return string The name of the exchange (e.g., 'coinbase', 'stripe').
     */
    public function getExchangeName(): string;
}
