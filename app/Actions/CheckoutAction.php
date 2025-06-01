<?php

namespace App\Actions;

use App\Http\Requests\CheckoutRequest;
use App\Http\Resources\TransactionResource;
use App\Interfaces\CheckoutServiceInterface;
use App\Models\Transaction;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutAction
{
    /**
     * Handle the checkout process.
     *
     * @param  CheckoutRequest  $checkoutRequest
     * @param  CheckoutServiceInterface  $checkoutService
     * @return JsonResource
     */
    public function handle(CheckoutRequest $checkoutRequest, CheckoutServiceInterface $checkoutService): JsonResource
    {
        $email = $checkoutRequest->email;
        $amount = $checkoutRequest->amount;
        $chargeId = $checkoutService->checkout($amount);

        // Store the initial transaction as pending
        $transaction = Transaction::create([
            'email' => $email,
            'amount' => $amount,
            'exchange' => $checkoutService->getExchangeName(),
            'exchange_charge_id' => $chargeId,
            'status' => Transaction::STATUS_PENDING,
        ]);

        return new TransactionResource($transaction);
    }
}
