<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('subscription_plans', function (Blueprint $table) {
    $table->id();

    $table->string('slug')->unique();
    $table->string('name');
    $table->text('description')->nullable();

    $table->decimal('price', 15, 2)->default(0);

    $table->integer('duration_days')->default(30);
    $table->integer('trial_days')->default(0);

    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};

