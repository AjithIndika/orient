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
        Schema::create('retun_getpass_details', function (Blueprint $table) {
            $table->increments('retun_getpass_details_id')->unique();
            $table->text('retun_geatpass_details_number');
            $table->text('retun_geatpass_details_number_hash');
            $table->text('retun_customers_id');
            $table->text('retun_geatpass_details_vehicle');
            $table->text('retun_geatpass_details_driver_name');
            $table->text('retun_geatpass_details_driver_nic');
            $table->text('retun_geatpass_details_driver_mobile');
            $table->text('retun_geatpass_details_crate_by');
            $table->text('return_gatepass_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retun_getpass_details');
    }
};
