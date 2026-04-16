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
        Schema::create('menfess_aliases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('menfess_post_id')->constrained()->onDelete('cascade');
            $table->string('alias_name'); // e.g. "Kucing Biru"
            $table->timestamp('created_at')->nullable();

            // 1 alias per user per thread
            $table->unique(['user_id', 'menfess_post_id']);
            $table->index('menfess_post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menfess_aliases');
    }
};
