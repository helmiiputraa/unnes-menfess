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
        Schema::create('daily_polls', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->boolean('is_active')->default(true);
            $table->boolean('result_sent')->default(false); // Sudah kirim ke WA?
            $table->integer('total_votes')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'starts_at', 'ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_polls');
    }
};
