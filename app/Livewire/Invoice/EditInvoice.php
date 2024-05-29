<?php

namespace App\Livewire\Invoice;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\InvoiceDetails;
use App\Models\InvoiceMacineDetails;

use App\Models\BoxDetails;
use App\Models\paddleDetails;
use App\Models\IronDetails;

use App\Models\MachinListDetails;



use Livewire\Component;

class EditInvoice extends Component
{

    public $invoice_details_number;
    public $box_details_id;
    public $paddle_details_id;
    public $iron_details_id;

    public $invoice_macine_details_id;
    public $invoice_details_customer_number;

    public $invoice_details_id;
    public $invoice_details_approved;


    public static function boxsn($box_details_id)
    {
        echo BoxDetails::where('box_details_id', $box_details_id)->value('box_details_serial_number');
    }

    /// paddel sn
    public static function paddlesn($paddle_details_id)
    {
        echo paddleDetails::where('paddle_details_id', $paddle_details_id)->value('paddle_details_serial_number');
    }

    /// paddel sn
    public static function ironsn($iron_details_id)
    {
        echo IronDetails::where('iron_details_id', $iron_details_id)->value('iron_details_serial_number');
    }


    public static function mcnumber($machin_list_details_id)
    {
        echo MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->value('machin_list_details_barcode');
    }



    public function save(){

        $validated = $this->validate([
            'invoice_details_approved' =>'required',
        ]);


        if(!empty($this->invoice_details_approved)){

        $invoice_details_id =InvoiceDetails::where('invoice_details_number',$this->invoice_details_number)->value('invoice_details_id');
        InvoiceDetails::where('invoice_details_id', $invoice_details_id)->update(['invoice_details_customer_number'=>$this->invoice_details_customer_number,
                                                                                                           'invoice_details_approved'=>$this->invoice_details_approved,
                                                                                                           'invoice_details_approved_by'=>Auth::user()->name,
                                                                                                           'invoice_details_approved_date'=>date('Y-m-d')]);
        toastr()->success(''.$this->invoice_details_number.'  '.'  This Invoice is ready to send to the customer!', 'Congrats');
        return redirect()->to('/new-invoice');
        }

     }




    public function check(){
        $invoice_details_id =InvoiceDetails::where('invoice_details_number',$this->invoice_details_number)->value('invoice_details_id');
        InvoiceDetails::where('invoice_details_id',$invoice_details_id)->update(['invoice_details_customer_number'=>$this->invoice_details_customer_number,'invoice_details_check_by'=>Auth::user()->name . date('Y-m-d')]);
        toastr()->success(''.$this->invoice_details_number.'  '.'  This Invoice is whaiting to approvel!', 'Congrats');
        return redirect()->to('/new-invoice');
    }


    public function render()
    {

        $invoice =InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_number',$this->invoice_details_number)->get();
        $machin=InvoiceMacineDetails::where('invoice_details_number','=',$this->invoice_details_number)->get();

       
        return view('livewire.invoice.edit-invoice',['invoice'=>$invoice,'machin'=>$machin])->layout('livewire.system.template.template')->title('Edit Invoice');
    }
}
