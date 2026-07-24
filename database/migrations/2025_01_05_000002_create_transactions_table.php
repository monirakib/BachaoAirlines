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
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id');
            $table->string('flight_id', 50)->nullable();
            $table->string('passenger_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('passport_number', 50)->nullable();
            $table->string('seat_number', 20)->nullable();
            $table->string('seat_type', 20)->nullable();
            $table->string('payment_method', 20)->nullable();
            $table->string('payment_number', 50)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('insurance_amount')->default(0);

            $table->foreign('flight_id')->references('Flight_ID')->on('flights');
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
