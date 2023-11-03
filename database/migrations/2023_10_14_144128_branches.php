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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('applied'); //1.applied 2.active 3.deactivated
            $table->string('name')->nullable();
            $table->string('manager');
            $table->string('manager_phone');
            $table->string('manager_national_id');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('province');
            $table->string('city');
            $table->string('neighbourhood');
            $table->string('ownership_type');
            $table->integer('property_area');
            $table->integer('property_age');
            $table->boolean('business_license')->default(false);
            $table->boolean('parking_lot')->default(false);
            $table->boolean('warehouse')->default(false);
            $table->boolean('kitchen')->default(false);
            $table->json('coordinates');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->time('open_hour')->nullable();
            $table->time('close_hour')->nullable();
            $table->json('open_days')->nullable();
            $table->json('pictures');
            $table->integer('discount')->nullable();
            $table->text('description')->nullable();
            $table->integer('fix_delivery')->nullable();
            $table->integer('delivery_per_km')->nullable();
            $table->time('preparation_time')->default("00:30:00");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
