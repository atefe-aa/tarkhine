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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type'); //1. 'message' 2.'consult'
            $table->string('full_name');
            $table->dateTime('best_time')->nullable();//if it's a cosultation ticket so it needs a best time to contact them
            $table->string('phone');
            $table->string('email')->nullable();
            $table->longText('message')->nullable();//it can be null if it's a consultation ticket
            $table->string('code');
            $table->string('status')->default('active'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
