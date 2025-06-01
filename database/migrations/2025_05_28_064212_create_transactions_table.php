<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // lenghts are set to match the existing sample data
            $table->string('email', length: 100);
            $table->decimal('amount', 10, 2);
            $table->string('exchange', length: 8);
            $table->string('exchange_charge_id', length: 10);
            $table->integer('status')->comment('0: failed, 1: successful, 2: pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
