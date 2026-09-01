<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tug_questions', function (Blueprint $table) {

            // =====================================================
            // ID
            // =====================================================

            // Random 8 karakter
            $table->string('id', 8)->primary();


            // =====================================================
            // PERTANYAAN
            // =====================================================

            $table->text('question');


            // =====================================================
            // TIPE SOAL
            // =====================================================

            $table->string('type')
                ->default('multiple_choice');


            // =====================================================
            // NILAI SOAL
            // =====================================================

            $table->unsignedInteger('score')
                ->default(1);


            // =====================================================
            // PILIHAN JAWABAN
            // =====================================================

            $table->string('option_a');

            $table->string('option_b');

            $table->string('option_c');

            $table->string('option_d');


            // =====================================================
            // JAWABAN BENAR
            // =====================================================

            // Menyimpan isi jawaban.
            // Contoh: "25"
            $table->string('correct_answer');


            // =====================================================
            // TUG GAME
            // =====================================================

            // Kekuatan tarikan ketika jawaban benar
            // Contoh: 10 = tali bergerak 10%
            $table->unsignedInteger('pull_power')
                ->default(10);


            // Kekuatan tarikan lawan ketika jawaban salah
            // Contoh: 10 = lawan menarik 10%
            $table->unsignedInteger('wrong_pull_power')
                ->default(10);


            // =====================================================
            // LAMPIRAN
            // =====================================================

            // Path file gambar/PDF
            $table->string('image')
                ->nullable();


            // =====================================================
            // URUTAN
            // =====================================================

            $table->integer('order')
                ->default(0);


            // =====================================================
            // STATUS
            // =====================================================

            $table->boolean('is_active')
                ->default(true);


            // =====================================================
            // TIME LIMIT
            // =====================================================

            // Waktu menjawab per soal dalam detik
            $table->unsignedInteger('time_limit')
                ->default(30);


            // =====================================================
            // TIMESTAMPS
            // =====================================================

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tug_questions');
    }
};

