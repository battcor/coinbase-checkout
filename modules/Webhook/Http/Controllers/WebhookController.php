<?php

namespace Modules\Webhook\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Modules\Webhook\Actions\WebhookAction;
use Modules\Webhook\Http\Requests\WebhookRequest;

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
