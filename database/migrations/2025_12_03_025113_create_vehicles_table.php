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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->string('vehicle_name');
            $table->string('plate_number')->unique();
            $table->enum('vehicle_type', ['bike', 'car', 'van', 'bus']);
            $table->string('vehicle_color');
            $table->integer('max_seats');
            $table->date('registration_date');
            $table->string('vehicle_brand')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->integer('year')->nullable();
            $table->json('rules')->nullable(); // {"max_2_in_back": true, "no_food": true, "no_pets": true, "no_smoking": true, "no_alcohol": true}
            $table->string('vehicle_photo')->nullable();
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
