<?php

namespace App\Livewire\Invoice;
use App\Models\InvoiceDetails;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Income;



use Livewire\Component;

class PandingInvoice extends Component
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
    public $incomes_invoice_id;
    public $incomes_date;
    public $incomes_amount;
//    public $invoice_details_total;




    public function payment(int $invoice_details_id){
        $edata=InvoiceDetails::where('invoice_details_id',$invoice_details_id)->first();
        if($edata){
              $this->invoice_details_id=$invoice_details_id;
              $this->invoice_details_total=$edata->invoice_details_total;
              $this->invoice_details_balance=$edata->invoice_details_total;
              $this->invoice_details_balance_recive_methord=$edata->invoice_details_balance_recive_methord;
          }
          else{
          }
          $this->dispatch('paymentUpdate');
    }


    public function update_invoice(){

       // dump($this->invoice_details_id);
        $validated = $this->validate([
          //  'invoice_details_balance' =>'required',
            'invoice_details_balance_recive_methord' =>'required',
            'invoice_details_balance_recive_cheque_number' =>'',
            'invoice_details_balance_recive_cheque_deposit_date' =>'',
            'invoice_details_balance_recive_reference_number' =>'',
            'invoice_details_balance_recive_bank_deposit_date' =>'',
        ]);




        InvoiceDetails::where('invoice_details_id',$this->invoice_details_id)->update([
            'invoice_details_balance'=>$this->invoice_details_balance,
            'invoice_details_balance_recive_methord'=>$this->invoice_details_balance_recive_methord,
            'invoice_details_balance_recive_cheque_number'=>$this->invoice_details_balance_recive_cheque_number,
             'invoice_details_balance_recive_cheque_deposit_date'=>$this->invoice_details_balance_recive_cheque_deposit_date,
             'invoice_details_balance_Date'=>date('Y-m-d H:i:s'),
             'invoice_details_balance_by'=>Auth::user()->name,
             'invoice_details_balance_recive_by'=>Auth::user()->name,
            'invoice_details_balance_recive_reference_number'=>$this->invoice_details_balance_recive_reference_number,
           'invoice_details_balance_recive_bank_deposit_date'=>$this->invoice_details_balance_recive_bank_deposit_date,
         ]);

         // income
         Income::create([
            'incomes_invoice_id'=> $this->invoice_details_id,
            'incomes_date'=>date('Y-m-d H:i:s'),
            'incomes_amount'=>$this->invoice_details_balance,
     ] );

         toastr()->success('Data has been saved successfully!', 'Congrats');
    }




    public function render()
    {
        $invoice =InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')
                                  ->where('invoice_details_approved',1)
                                //  ->where('invoice_details_balance','>','invoice_details_balance')
                                  ->where('invoice_details_balance',null)
                                  ->get();

        return view('livewire.invoice.panding-invoice',['invoice'=>$invoice])->layout('livewire.system.template.template')->title('Pending Invoice');
    }
}
