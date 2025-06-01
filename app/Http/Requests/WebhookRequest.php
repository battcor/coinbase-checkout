<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string',
            'status' => 'required|integer|in:0,1', // 0: failed, 1: successful
        ];
    }
}
