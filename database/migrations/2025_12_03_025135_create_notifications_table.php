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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->enum('type', ['ride_request', 'ride_update', 'payment', 'system', 'promotion']);
            $table->unsignedBigInteger('related_id')->nullable(); // ride_id, transaction_id, etc
            $table->string('related_type')->nullable(); // 'ride', 'transaction', etc
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
