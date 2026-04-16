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
        Schema::create('menfess_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menfess_post_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('menfess_comments')->onDelete('cascade');
            $table->text('content');
            $table->integer('upvote_count')->default(0);
            $table->integer('downvote_count')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->enum('status', ['active', 'hidden', 'deleted'])->default('active');
            $table->timestamps();

            $table->index(['menfess_post_id', 'created_at']);
            $table->index('user_id');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menfess_comments');
    }
};
