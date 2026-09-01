<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tug_questions', function (Blueprint $table) {

            // ID random 8 karakter
            $table->string('id', 8)->primary();

            $table->text('question');

            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');

            // Nilai: option_a / option_b / option_c / option_d
            $table->string('correct_answer');

            // Urutan soal
            $table->integer('order')->default(0);

            // Soal aktif atau tidak
            $table->boolean('is_active')->default(true);

            // Waktu menjawab per soal, dalam detik
            $table->unsignedInteger('time_limit')->default(30);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tug_questions');
    }
};