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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->decimal('amount');
            $table->foreignId('payment_product_id');
            $table->foreignId('user_id');

            $table->string('bank_payment_id')->nullable();
            $table->string('bank_confirmation_url')->nullable();

            $table->integer('status_id')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
