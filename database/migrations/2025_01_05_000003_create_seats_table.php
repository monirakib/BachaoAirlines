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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('flight_id', 50)->nullable();
            $table->string('seat_number', 10)->nullable();
            $table->enum('status', ['available', 'booked'])->default('available');
            $table->foreignId('transaction_id')->nullable()->constrained('transactions')->cascadeOnDelete();

            $table->foreign('flight_id')->references('Flight_ID')->on('flights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
