<?php

namespace Modules\Checkout\Interfaces;

interface CheckoutServiceInterface extends ExchangeServiceInterface
{
    /**
     * Simulates or performs an API call to get a charge ID for a given amount.
     *
     * @param string $amount The amount for which to get a charge ID.
     * @return string|null The generated charge ID, or null if an error occurs.
     */
    public function checkout(float $amount): ?string;
}