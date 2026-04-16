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
        Schema::create('alias_pool', function (Blueprint $table) {
            $table->id();
            $table->string('adjective'); // Kata sifat: Biru, Hijau, Galak, dll
            $table->string('noun');      // Kata benda/hewan: Kucing, Gajah, Elang, dll
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['adjective', 'noun']); // Prevent duplicate combinations
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alias_pool');
    }
};
