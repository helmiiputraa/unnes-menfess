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
        Schema::create('poll_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_poll_id')->constrained()->onDelete('cascade');
            $table->foreignId('poll_option_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('created_at')->nullable();

            // 1 vote per user per poll
            $table->unique(['daily_poll_id', 'user_id']);
            $table->index('poll_option_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poll_votes');
    }
};
