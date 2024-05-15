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
        Schema::create('deliverypaddle_details', function (Blueprint $table) {
            $table->increments('deliverypaddle_details_id')->unique();
            $table->string('geatpass_details_number');
            $table->string('paddle_details_id');
            $table->string('paddle_daily_rent')->nullable();
            $table->string('customers_id')->nullable();
            $table->string('deliverypaddle_user');
            $table->string('deliverypaddle_date');
            $table->string('last_invoice_date')->nullable();
            $table->string('return_delivery_note_number')->nullable();
            $table->string('return_delivery_note_date')->nullable();
            $table->string('return_delivery_note_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverypaddle_details');
    }
};
