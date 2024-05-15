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
        Schema::create('geatpass_temp_details', function (Blueprint $table) {
            $table->increments('geatpass_temp_details_id')->unique();
            $table->string('tempGetpassid')->unique();
            $table->string('customers_id');
            $table->string('geatpass_temp_details_vehicle');
            $table->string('geatpass_temp_details_driver_name');
            $table->string('geatpass_temp_details_driver_nic');
            $table->string('geatpass_temp_details_driver_mobile');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geatpass_temp_details');
    }
};
