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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('show_name')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('phone');
            $table->json('addresses')->nullable();
            $table->json('cart')->nullable(); //[foodId=>count, foodId=>count, ...]
            $table->json('orders')->nullable();
            $table->json('favorites')->nullable();
            $table->string('status')->nullable();
            $table->text('photo')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('otp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
