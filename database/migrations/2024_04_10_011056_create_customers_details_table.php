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
        Schema::create('customers_details', function (Blueprint $table) {
            $table->increments('customers_id')->unique();
            $table->text('customers_name')->unique();
            $table->string('customers_address');
            $table->string('Customers_relation_officer_name');
            $table->string('customers_telephone');
            $table->string('customers_email');
            $table->string('customers_register_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_details');
    }
};
