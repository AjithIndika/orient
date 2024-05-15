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
        Schema::create('delivery__othe__parts', function (Blueprint $table) {
            $table->increments('delivery_othe_parts_id')->unique();
            $table->string('geatpass_details_number');
            $table->string('othe_parts_id');
            $table->string('customers_id')->nullable();
            $table->string('othe_parts_daily_rate')->nullable();
            $table->string('othe_parts_sn')->nullable();
            $table->string('delivery_othe_parts_user');
            $table->string('delivery_othe_parts_date');
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
        Schema::dropIfExists('delivery__othe__parts');
    }
};
