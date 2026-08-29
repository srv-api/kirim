<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {

            // ID assessment random 10 karakter
            $table->string('id', 10)->primary();

            // User pemilik assessment
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('category')->nullable();

            $table->integer('duration')
                ->default(60);

            $table->decimal('passing_score', 5, 2)
                ->default(70);

            $table->string('pin', 6)->nullable();

            $table->enum('status', [
                'draft',
                'active',
                'inactive',
            ])->default('draft');

            $table->timestamp('start_at')
                ->nullable();

            $table->timestamp('end_at')
                ->nullable();

            $table->string('timezone')
                ->default('Asia/Jakarta');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};