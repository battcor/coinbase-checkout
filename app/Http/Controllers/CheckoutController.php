<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Interfaces\CheckoutServiceInterface;
use App\Actions\CheckoutAction;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request to initiate a checkout.
     *
     * This method simulates the creation of a transaction and returns its details.
     *
     * @param  CheckoutRequest $checkoutRequest
     * @param  CheckoutServiceInterface $checkoutService
     * @return JsonResource
     */
    public function __invoke(CheckoutRequest $checkoutRequest, CheckoutAction $checkoutAction, CheckoutServiceInterface $checkoutService): JsonResource
    {
        return $checkoutAction->handle($checkoutRequest, $checkoutService);
    }
}
