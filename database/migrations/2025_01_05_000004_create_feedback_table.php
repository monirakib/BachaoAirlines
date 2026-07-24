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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('contact', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('flight_number', 20)->nullable();
            $table->integer('rating')->nullable();
            $table->text('comments')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
