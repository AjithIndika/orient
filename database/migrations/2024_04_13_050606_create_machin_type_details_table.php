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
        Schema::create('machin_type_details', function (Blueprint $table) {
            $table->increments('machin_type_details_id')->unique();
            $table->string('machin_type_details_name');
            $table->string('machin_type_details_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machin_type_details');
    }
};
