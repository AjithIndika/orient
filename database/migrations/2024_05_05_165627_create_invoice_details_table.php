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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('invoice_details_id')->unique();
            $table->string('invoice_details_number');
            $table->string('customers_id');
            $table->string('geatpass_details_number')->nullable();
            $table->string('retun_geatpass_details_number')->nullable();
            $table->string('invoice_details_customer_number')->nullable();
            $table->string('invoice_details_check_by')->nullable();
            $table->string('invoice_details_approved')->nullable();
            $table->string('invoice_details_approved_by')->nullable();
            $table->string('invoice_details_approved_date')->nullable();
            $table->string('invoice_details_total')->nullable();
            $table->string('invoice_details_balance')->nullable();
            $table->string('invoice_details_balance_Date')->nullable();
            $table->string('invoice_details_balance_by')->nullable();
            $table->string('invoice_details_balance_recive_methord')->nullable();
            $table->string('invoice_details_balance_recive_cheque_number')->nullable();

            $table->string('invoice_details_balance_recive_cheque_deposit_date')->nullable();
            $table->string('invoice_details_balance_recive_reference_number')->nullable();
            $table->string('invoice_details_balance_recive_bank_deposit_date')->nullable();
            $table->string('invoice_details_balance_recive_by')->nullable();
            $table->string('invoice_details_balance_recive_date')->nullable();
            $table->string('invoice_details_balance_cheque_bank_date')->nullable();
            $table->string('invoice_details_balance_cheque_bank_refer_number')->nullable();
            $table->string('invoice_details_balance_cheque_bank_by')->nullable();



            $table->string('invoice_details_send_email')->nullable();
            $table->string('invoice_details_due_Date')->nullable();
            $table->string('invoice_details_jenarate_Date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
