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
        Schema::create('menfess_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->string('media_path')->nullable();
            $table->string('media_type')->nullable(); // image, video
            $table->boolean('is_pinned')->default(false);
            $table->timestamp('pinned_until')->nullable();
            $table->boolean('is_sponsored')->default(false);
            $table->boolean('is_repost')->default(false);
            $table->foreignId('original_post_id')->nullable()->constrained('menfess_posts')->onDelete('set null');
            $table->text('repost_comment')->nullable();
            $table->integer('upvote_count')->default(0);
            $table->integer('downvote_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('share_count')->default(0);
            $table->boolean('is_visible')->default(true); // false = shadow banned
            $table->enum('status', ['active', 'hidden', 'deleted'])->default('active');
            $table->timestamps();

            // Composite index for feed queries
            $table->index(['status', 'is_visible', 'created_at']);
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menfess_posts');
    }
};
