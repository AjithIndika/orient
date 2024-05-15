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
        Schema::create('suppliers_details', function (Blueprint $table) {
            $table->increments('suppliers_id')->unique();
            $table->text('suppliers_name')->unique();
            $table->string('suppliers_address');
            $table->string('suppliers_relation_officer_name');
            $table->string('suppliers_telephone');
            $table->string('suppliers_email');
            $table->string('suppliers_register_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers_details');
    }
};
