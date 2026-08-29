<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {

    $table->string('id', 6)->primary();

    $table->string('assessment_id', 10);

    $table->enum('type', [
        'multiple_choice',
        'free_text',
    ])->default('multiple_choice');

    $table->text('question');

    $table->integer('score')->default(1);

    $table->integer('order')->default(0);

    $table->string('correct_answer')->nullable();
    
    $table->string('image')->nullable();

    $table->timestamps();

    $table->foreign('assessment_id')
        ->references('id')
        ->on('assessments')
        ->cascadeOnDelete();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};