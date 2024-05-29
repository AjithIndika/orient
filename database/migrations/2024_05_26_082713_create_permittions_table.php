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
        Schema::create('permittions', function (Blueprint $table) {
            $table->increments('permittions_id')->unique();
            $table->string('user_id');
            $table->string('permittions')->nullable();
           /* $table->string('permittions_user_create');
            $table->string('permittions_branch_view');
            $table->string('permittions_branch_create');
            $table->string('permittions_branch_update');
            $table->string('permittions_customers_view');
            $table->string('permittions_customers_create');
            $table->string('permittions_customers_update');
            $table->string('permittions_suppliers_view');
            $table->string('permittions_suppliers_create');
            $table->string('permittions_suppliers_update');

            $table->string('permittions_MachineDetails_view');
            $table->string('permittions_Machinelist_view');
            $table->string('permittions_suppliers_create');
            $table->string('permittions_suppliers_update');

            $table->string('permittions_Machinemodel_view');
            $table->string('permittions_Machinemodel_create');
            $table->string('permittions_Machinemodel_update');

            $table->string('permittions_Machinebrand_view');
            $table->string('permittions_Machinebrand_create');
            $table->string('permittions_Machinebrand_update');

            $table->string('permittions_Iron_view');
            $table->string('permittions_Iron_create');
            $table->string('permittions_Iron_update');

            $table->string('permittions_paddle_view');
            $table->string('permittions_paddle_create');
            $table->string('permittions_paddle_update');

            $table->string('permittions_box_view');
            $table->string('permittions_box_create');
            $table->string('permittions_box_update');

            $table->string('permittions_DeliveryNote_view');
            $table->string('permittions_DeliveryNote_create');
            $table->string('permittions_DeliveryNote_update');
            $table->string('permittions_newDeliveryNote');


            $table->string('permittions_otherParts_view');
            $table->string('permittions_otherPartsType_create');
            $table->string('permittions_otherPartsType_update');
            $table->string('permittions_otherParts_view');
            $table->string('permittions_otherParts_new');
            $table->string('permittions_otherParts_updte');


            $table->string('permittions_invoice_view');
            $table->string('permittions_invoice_check');
            $table->string('permittions_invoice_approve');

            $table->string('permittions_readySend_view');
            $table->string('permittions_readySend_email');
            $table->string('permittions_readySend_Dawnload');
            $table->string('permittions_report_view');

*/


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permittions');
    }
};
