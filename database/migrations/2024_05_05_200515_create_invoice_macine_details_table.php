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
        Schema::create('invoice_macine_details', function (Blueprint $table) {
            $table->increments('invoice_macine_details_id')->unique();
            $table->string('invoice_details_number');
            $table->string('geatpass_details_number');
            $table->string('machin_list_details_id');
            $table->string('customers_id')->nullable();
            $table->string('box_details_id')->nullable();
            $table->string('box_details_recive_date')->nullable();
            $table->string('box_details_recive_by')->nullable();
            $table->string('machin_type_details_id');
            $table->string('paddle_details_id')->nullable();
            $table->string('paddle_details_recive_date')->nullable();
            $table->string('paddle_details_recive_by')->nullable();
            $table->string('iron_details_id')->nullable();
            $table->string('iron_details_recive_date')->nullable();
            $table->string('iron_details_recive_by')->nullable();
            $table->string('machin_list_details_daily_rent');
            $table->string('branches_id');
            $table->string('delivery_machine_details_user');
            $table->string('delivery_machine_details_date');
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
        Schema::dropIfExists('invoice_macine_details');
    }
};
