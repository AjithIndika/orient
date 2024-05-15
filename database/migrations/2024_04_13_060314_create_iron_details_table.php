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
        Schema::create('iron_details', function (Blueprint $table) {
            $table->increments('iron_details_id')->unique();
            $table->string('iron_details_name');
            $table->string('iron_details_serial_number');
            $table->string('iron_details_status')->nullable();
            $table->string('deliveryNote_id')->nullable();
            $table->string('iron_daily_rent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iron_details');
    }
};
