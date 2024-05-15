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
        Schema::create('temp_othe_parts', function (Blueprint $table) {
            $table->increments('temp_othe_parts_id')->unique();
            $table->string('tempGetpassid');
            $table->string('othe_parts_id');
            $table->string('customers_id');
            $table->string('othe_parts_daily_rate')->nullable();
            $table->string('othe_parts_sn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_othe_parts');
    }
};
