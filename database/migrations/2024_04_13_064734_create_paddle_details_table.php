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
        Schema::create('paddle_details', function (Blueprint $table) {
            $table->increments('paddle_details_id')->unique();
            $table->string('paddle_details_name');
            $table->string('paddle_details_serial_number');
            $table->string('paddle_details_status')->nullable();
            $table->string('deliveryNote_id')->nullable();
            $table->string('paddle_daily_rent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paddle_details');
    }
};
