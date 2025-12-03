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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->string('ride_number')->unique();
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->onDelete('set null');
            $table->unsignedBigInteger('passenger_id')->nullable(); // Will link to passengers table
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->onDelete('set null');

            // Pickup details
            $table->string('pickup_address');
            $table->decimal('pickup_latitude', 10, 8);
            $table->decimal('pickup_longitude', 11, 8);

            // Dropoff details
            $table->string('dropoff_address');
            $table->decimal('dropoff_latitude', 10, 8);
            $table->decimal('dropoff_longitude', 11, 8);

            // Ride details
            $table->enum('status', [
                'pending',
                'accepted',
                'driver_arrived',
                'on_way',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->decimal('estimated_fare', 10, 2);
            $table->decimal('final_fare', 10, 2)->nullable();
            $table->decimal('distance_km', 8, 2)->nullable();
            $table->integer('estimated_duration_minutes')->nullable();
            $table->integer('actual_duration_minutes')->nullable();

            // OTP verification
            $table->string('verification_otp', 6)->nullable();
            $table->boolean('otp_verified')->default(false);

            // Rating & Review
            $table->decimal('driver_rating', 3, 2)->nullable();
            $table->text('driver_review')->nullable();
            $table->decimal('passenger_rating', 3, 2)->nullable();
            $table->text('passenger_review')->nullable();

            // Timestamps for tracking
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('driver_arrived_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->enum('cancelled_by', ['driver', 'passenger', 'system'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
