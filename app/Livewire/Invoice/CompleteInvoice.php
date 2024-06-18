<?php

namespace App\Livewire\Invoice;

use Livewire\Component;
use App\Models\InvoiceDetails;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Income;




class CompleteInvoice extends Component
{


    public $invoice_details_id;
    public $invoice_details_total;
    public $invoice_details_balance_recive_methord;
    public $invoice_details_balance_recive_cheque_number;
    public $invoice_details_balance_recive_cheque_deposit_date;
    public $invoice_details_balance_recive_reference_number;
    public $invoice_details_balance_recive_bank_deposit_date;
   // invoice_details_balance_recive_cheque_deposit_date
    public $invoice_details_balance;
//    public $invoice_details_total;



    public function render()
    {

        $invoice =InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')
        ->where('invoice_details_approved',1)
       ->whereNotNull('invoice_details_balance')
       // ->where('invoice_details_balance',null)
        ->get();

        return view('livewire.invoice.complete-invoice',['invoice'=>$invoice])->layout('livewire.system.template.template')->title('Compleate Invoice');

    }
}
