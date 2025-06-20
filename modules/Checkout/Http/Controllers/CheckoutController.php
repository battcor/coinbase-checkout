<?php

namespace Modules\Checkout\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Checkout\Actions\CheckoutAction;
use Modules\Checkout\Http\Requests\CheckoutRequest;
use Modules\Checkout\Interfaces\CheckoutServiceInterface;

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
