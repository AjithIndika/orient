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
        Schema::create('machin_list_details', function (Blueprint $table) {
            $table->increments('machin_list_details_id')->unique();
            $table->string('machin_list_details_barcode')->unique();
            $table->string('box_details_id')->nullable();
            $table->string('machin_brand_details_id')->nullable();
            $table->string('machin_model_details_id')->nullable();
            $table->string('machin_type_details_id');
            $table->string('paddle_details_id')->nullable();
            $table->string('iron_details_id')->nullable();
            $table->string('machin_list_details_daily_rent');
            $table->text('machin_list_details_note')->nullable();
            $table->string('branches_id');
            $table->string('machin_list_details_register_user');
            $table->string('machin_list_details_register_date_time');
            $table->string('machin_list_details_status')->nullable();
            $table->string('updated_at');
            $table->string('created_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machin_list_details');
    }
};
