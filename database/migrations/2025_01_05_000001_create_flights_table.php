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
        Schema::create('flights', function (Blueprint $table) {
            $table->string('Flight_ID', 10)->primary();
            $table->time('Start_time')->nullable();
            $table->string('Duration', 20)->nullable();
            $table->time('End_time')->nullable();
            $table->string('Flight_from', 10)->nullable();
            $table->string('Type', 10)->nullable();
            $table->string('Flight_to', 10)->nullable();
            $table->date('Start_date')->nullable();
            $table->date('Land_date')->nullable();
            $table->integer('Price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
