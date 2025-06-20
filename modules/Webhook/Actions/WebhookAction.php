<?php

namespace Modules\Webhook\Actions;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Modules\Webhook\Http\Requests\WebhookRequest;

class WebhookAction
{
    protected Transaction $transactionModel;

    public function __construct(Transaction $transactionModel)
    {
        $this->transactionModel = $transactionModel;
    }

    /**
     * Handle the webhook request.
     *
     * @param  WebhookRequest  $webhookRequest
     * @return JsonResponse
     */
    public function handle(WebhookRequest $webhookRequest): JsonResponse
    {
        // Extract necessary data from the webhook request
        $chargeId = $webhookRequest->id;
        $status = $webhookRequest->status;

        // Find the transaction by ID
        $transaction = $this->transactionModel->where('exchange_charge_id', $chargeId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Update the transaction status based on the webhook payload
        $transaction->status = $status;
        $transaction->save();

        return response()->json(['message' => 'Transaction updated successfully'], 200);
    }
}
