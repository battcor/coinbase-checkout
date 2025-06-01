<?php

namespace App\Http\Controllers;

use App\Actions\WebhookAction;
use App\Http\Requests\WebhookRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Webhook Receiver: Accepts a simulated Coinbase webhook payload.
     * Validates the payload and updates the transaction status.
     *
     * @param  WebhookRequest  $request
     * @return JsonResponse
     */
    public function __invoke(WebhookRequest $webhookRequest, WebhookAction $webhookAction): JsonResponse
    {
        // Log the incoming request for debugging purposes
        Log::info('Webhook received', ['payload' => $webhookRequest->all()]);

        // Handle the webhook request using the WebhookAction
        return $webhookAction->handle($webhookRequest);
    }
}
