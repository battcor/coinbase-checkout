<?php

namespace Modules\Checkout\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $hostedPaymentUrl = config("exchanges.{$this->exchange}.hosted_payment_url");
        return [
            'hosted_payment_url' => $hostedPaymentUrl . '/' . $this->exchange_charge_id,
        ];
    }
}
