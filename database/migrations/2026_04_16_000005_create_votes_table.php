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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('voteable_type'); // App\Models\MenfessPost or App\Models\MenfessComment
            $table->unsignedBigInteger('voteable_id');
            $table->enum('vote_type', ['up', 'down']);
            $table->timestamps();

            // 1 vote per user per item
            $table->unique(['user_id', 'voteable_type', 'voteable_id']);
            $table->index(['voteable_type', 'voteable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
