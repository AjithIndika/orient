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
        Schema::create('invoice_paddletails', function (Blueprint $table) {
            $table->increments('invoice_paddletails_id')->unique();
            $table->string('invoice_details_number');
            $table->string('geatpass_details_number');
            $table->string('paddle_details_id');
            $table->string('customers_id')->nullable();
            $table->string('paddle_daily_rent')->nullable();
            $table->string('deliverypaddle_user')->nullable();
            $table->string('deliverypaddle_date')->nullable();
            $table->string('branches_id')->nullable();
            $table->string('last_invoice_date')->nullable();
            $table->string('return_delivery_note_number')->nullable();
            $table->string('return_delivery_note_date')->nullable();
            $table->string('return_delivery_recive_by')->nullable();
            $table->string('used_date')->nullable();
            $table->string('cost_of_used_date')->nullable();
            $table->string('invoice_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_paddletails');
    }
};
