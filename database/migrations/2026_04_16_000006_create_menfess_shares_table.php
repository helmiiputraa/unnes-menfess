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
        Schema::create('menfess_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menfess_post_id')->constrained()->onDelete('cascade');
            $table->string('share_token')->unique(); // Unique token for share link
            $table->timestamp('created_at')->nullable();

            $table->index('menfess_post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menfess_shares');
    }
};
