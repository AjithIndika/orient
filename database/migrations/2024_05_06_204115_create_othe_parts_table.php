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
        Schema::create('othe_parts', function (Blueprint $table) {
            $table->increments('othe_parts_id')->unique();
            $table->string('othe_parts_types_id');
            $table->string('othe_parts_name')->nullable();
            $table->string('othe_parts_sn');
            $table->string('othe_parts_daily_rate')->nullable();
            $table->string('othe_parts_status')->nullable();
            $table->string('deliveryNote_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('othe_parts');
    }
};
