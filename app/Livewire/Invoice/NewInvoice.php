<?php

namespace App\Livewire\Invoice;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Livewire\Component;

use App\Models\InvoiceDetails;

class NewInvoice extends Component
{
    public function render()
    {

        $invoice =InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_approved',null)->get();
        return view('livewire.invoice.new-invoice',['invoice'=>$invoice])->layout('livewire.system.template.template')->title('New Invoice');
    }
}
