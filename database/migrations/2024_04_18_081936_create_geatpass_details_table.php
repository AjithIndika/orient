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
        Schema::create('geatpass_details', function (Blueprint $table) {
            $table->increments('geatpass_details_id')->unique();
            $table->text('geatpass_details_number')->unique();
            $table->text('geatpass_details_number_hash')->unique();
            $table->text('customers_id');
            $table->text('geatpass_details_vehicle');
            $table->text('geatpass_details_driver_name');
            $table->text('geatpass_details_driver_nic');
            $table->text('geatpass_details_driver_mobile');
            $table->text('geatpass_details_crate_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geatpass_details');
    }
};
