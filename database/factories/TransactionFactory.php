<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'amount' => fake()->randomFloat(2, 0.01, 1000), // Random amount between 0.01 and 1000
            'exchange' => 'coinbase',
            'exchange_charge_id' => Str::random(10), // Random 10-digit charge ID
            'status' => 'pending',
        ];
    }
}
