<?php

namespace Modules\Checkout\Actions;

use App\Models\Transaction;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Checkout\Http\Requests\CheckoutRequest;
use Modules\Checkout\Http\Resources\TransactionResource;
use Modules\Checkout\Interfaces\CheckoutServiceInterface;

class CheckoutAction
{
    protected Transaction $transactionModel;

    public function __construct(Transaction $transactionModel)
    {
        $this->transactionModel = $transactionModel;
    }

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
        $transaction = $this->transactionModel->create([
            'email' => $email,
            'amount' => $amount,
            'exchange' => $checkoutService->getExchangeName(),
            'exchange_charge_id' => $chargeId,
            'status' => Transaction::STATUS_PENDING,
        ]);

        return new TransactionResource($transaction);
    }
}
