<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_results', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | ASSESSMENT
            |--------------------------------------------------------------------------
            */

            $table->string('assessment_id', 10);

            $table->foreign('assessment_id')
                ->references('id')
                ->on('assessments')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | PARTICIPANT
            |--------------------------------------------------------------------------
            */

            $table->foreignId('participant_id')
                ->constrained('participants')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | HASIL
            |--------------------------------------------------------------------------
            */

            $table->integer('score')
                ->default(0);

            $table->integer('total_questions')
                ->default(0);

            $table->integer('correct_answers')
                ->default(0);

            $table->integer('wrong_answers')
                ->default(0);

            $table->decimal('percentage', 5, 2)
                ->default(0);

            $table->string('status')
                ->default('completed');


            /*
            |--------------------------------------------------------------------------
            | WAKTU
            |--------------------------------------------------------------------------
            */

            $table->timestamp('started_at')
                ->nullable();

            $table->timestamp('completed_at')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_results');
    }
};