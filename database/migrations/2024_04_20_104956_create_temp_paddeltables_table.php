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
        Schema::create('temp_paddeltables', function (Blueprint $table) {
            $table->increments('temp_paddeltables_id')->unique();
            $table->string('paddle_details_id');
            $table->string('tempGetpassid');
            $table->string('customers_id')->nullable();
            $table->string('paddle_daily_rent')->nullable();
            $table->string('paddle_details_serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_paddeltables');
    }
};
