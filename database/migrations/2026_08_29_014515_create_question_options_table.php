<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | ID
            |--------------------------------------------------------------------------
            */

            $table->string('id', 6)->primary();


            /*
            |--------------------------------------------------------------------------
            | QUESTION
            |--------------------------------------------------------------------------
            */

            $table->string('question_id', 6);

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->cascadeOnDelete();


            /*
            |--------------------------------------------------------------------------
            | OPTION
            |--------------------------------------------------------------------------
            */

            $table->string('label', 10);

            $table->text('option_text');

            $table->boolean('is_correct')
                ->default(false);

            $table->integer('order')
                ->default(0);


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};