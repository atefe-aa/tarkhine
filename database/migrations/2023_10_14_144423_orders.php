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
        Schema::create('orders', function(Blueprint $table) {
            $table->id();
            $table->string('status')->default('suspended'); //1.suspended 2.preparing 3.sent 4.delivered 
            $table->foreignId('address_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->json('foods');
            $table->integer('total_price');
            $table->integer('foods_discount')->default(0);
            $table->integer('discount_code')->nullable();
            $table->integer('delivery_cost')->default(0);
            $table->integer('paid')->default(0);
            $table->string('delivery_type')->default('courier');//1.'courier' 2.'in_person'
            $table->string('payment_method')->default('online');//1.'online' 2.'in_person'
            $table->string('bill_code')->nullable();
            $table->longText('description')->nullable();
            $table->string('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
