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
        Schema::create('word_filters', function (Blueprint $table) {
            $table->id();
            $table->string('word'); // Kata/frasa yang disensor
            $table->string('replacement')->default('***');
            $table->enum('severity', ['warn', 'block'])->default('warn'); // warn=ganti, block=tolak
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_filters');
    }
};
