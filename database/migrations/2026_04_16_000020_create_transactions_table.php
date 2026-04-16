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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['pinned_menfess', 'promoted_product', 'upload_product', 'sponsor']);
            $table->decimal('amount', 12, 2); // Nominal (misal: 6000 untuk upload)
            $table->enum('status', ['pending', 'waiting_confirmation', 'paid', 'failed', 'refunded'])->default('pending');
            $table->foreignId('payment_method_id')->nullable()->constrained()->onDelete('set null');
            $table->string('payment_proof')->nullable();   // Path bukti transfer
            $table->string('reference_type')->nullable();   // Polymorphic: MenfessPost, Product, Sponsor
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('admin_notes')->nullable();        // Catatan admin saat validasi
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index(['type', 'status']);
            $table->index(['reference_type', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
