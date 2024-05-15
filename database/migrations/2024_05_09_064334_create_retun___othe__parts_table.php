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
        Schema::create('retun___othe__parts', function (Blueprint $table) {
            $table->increments('retun___othe__parts_id')->unique();
            $table->string('retun_geatpass_details_number');
            $table->string('geatpass_details_number');
            $table->string('othe_parts_id');
            $table->string('customers_id')->nullable();
            $table->string('othe_parts_daily_rate')->nullable();
            $table->string('othe_parts_sn')->nullable();
            $table->string('last_invoice_date')->nullable();
            $table->string('return_delivery_note_number')->nullable();
            $table->string('return_delivery_note_date')->nullable();
            $table->string('return_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retun___othe__parts');
    }
};
