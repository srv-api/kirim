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
        Schema::create('subscriptions', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('subscription_plan_id')
        ->constrained('subscription_plans')
        ->cascadeOnDelete();

    $table->foreignId('transaction_id')
        ->constrained('transactions')
        ->cascadeOnDelete();

    $table->string('status', 30)->default('active');

    $table->timestamp('starts_at')->nullable();
    $table->timestamp('ends_at')->nullable();

    $table->timestamps();

    $table->index('user_id');
    $table->index('status');
    $table->index('ends_at');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
