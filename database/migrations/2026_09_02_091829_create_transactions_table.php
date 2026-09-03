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

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('subscription_plan_id')
        ->nullable()
        ->constrained('subscription_plans')
        ->nullOnDelete();

    $table->string('order_id', 100)->unique();

    $table->string('transaction_id', 100)->nullable();

    $table->string('payment_type', 50)->nullable();

    $table->decimal('gross_amount', 15, 2);

    $table->string('transaction_status', 30)
        ->default('pending');

    $table->string('fraud_status', 30)
        ->nullable();

    $table->json('payment_data')
        ->nullable();

    $table->timestamp('paid_at')
        ->nullable();

    $table->timestamp('expired_at')
        ->nullable();

    $table->timestamps();

    $table->index('user_id');
    $table->index('transaction_status');
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
