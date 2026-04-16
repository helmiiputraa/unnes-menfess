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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->enum('condition', ['new', 'used', 'like_new'])->default('used');
            $table->string('whatsapp_number')->nullable(); // Seller contact
            $table->enum('status', ['pending', 'active', 'sold', 'hidden', 'rejected'])->default('pending');
            $table->boolean('is_promoted')->default(false);
            $table->timestamp('promoted_until')->nullable();
            $table->boolean('is_paid')->default(false); // Fee upload 6k sudah dibayar?
            $table->integer('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('category_id');
            $table->index(['status', 'created_at']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
