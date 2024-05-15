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
        Schema::create('getpass_temp_items_details', function (Blueprint $table) {
            $table->increments('getpass_temp_items_details_id')->unique();
            $table->string('tempGetpassid');
            $table->string('machin_list_details_id');
            $table->string('customers_id')->nullable();
            $table->string('box_details_id')->nullable();
            $table->string('machin_type_details_id');
            $table->string('paddle_details_id')->nullable();
            $table->string('iron_details_id')->nullable();
            $table->string('machin_list_details_daily_rent');
            $table->text('geatpass_temp_details_user_id');
            $table->string('branches_id');
            $table->string('geatpass_temp_details_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getpass_temp_items_details');
    }
};
