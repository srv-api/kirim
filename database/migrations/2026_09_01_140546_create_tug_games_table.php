<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tug_games', function (Blueprint $table) {
            $table->string('id', 8)->primary();

            $table->string('player_one', 100);

            $table->string('player_two', 100);

            $table->unsignedInteger('duration')->default(60);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tug_games');
    }
};