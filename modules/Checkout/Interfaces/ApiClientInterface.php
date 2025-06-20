<?php

namespace Modules\Checkout\Interfaces;

interface ApiClientInterface
{
    /**
     * Simulates sending a request to an external API.
     *
     * In a real application, this would involve using Guzzle HTTP client
     * or Laravel's HTTP client to make actual API calls.
     *
     * @param array $data The data to send in the fake request.
     * @return array A simulated API response.
     */
    public function send(array $data): array;
}
