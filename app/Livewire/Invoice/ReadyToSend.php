<?php

namespace App\Livewire\Invoice;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\InvoiceDetails;
use App\Models\InvoiceMacineDetails;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;
use App\Models\BoxDetails;
use App\Models\paddleDetails;
use App\Models\IronDetails;
use App\Models\MachinListDetails;


class ReadyToSend extends Component
{

    public $invoice_details_number;
    public $invoice_details_id;
    public $customers_email;

    public  $mailData;

    public function sendEmails($invoice_details_id){

       // dump($invoice_details_id);


        $edata = InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_id',$invoice_details_id)->first();
        if ($edata) {
            $this->invoice_details_id = $edata->invoice_details_id;
            $this->invoice_details_number= $edata->invoice_details_number;
            $this->customers_email= $edata->customers_email;
        } else {
        }
        $this->dispatch('sendemailModal');
    }




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


    /// mashin
    public static function mcde($machin_list_details_id)
    {
        echo MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->value('machin_list_details_barcode');
    }


    public static function mcdetails($machin_list_details_id)
    {
        echo MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->value('machin_list_details_note');
    }

 


    public function emailSensconfrom(){

       $invoice = InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_id',$this->invoice_details_id)->first();
       $inMC =InvoiceMacineDetails::where('invoice_details_number','=', $this->invoice_details_number)->get();

       $mailData=[
        'invoice'=>json_encode( $invoice),
        'inMc'=>InvoiceMacineDetails::where('invoice_details_number','=', $this->invoice_details_number)->get(),
       ];

        Mail::mailer('acc')->to('kindika144@gmail.com')->send(new SendInvoice($mailData,$this->invoice_details_number));
        toastr()->success('email send!', 'Congrats');
    }


    public function render()
    {
       // return view('livewire.invoice.ready-to-send');
        $invoice =InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_approved',1)->where('invoice_details_send_email',null)->get();
        return view('livewire.invoice.ready-to-send',['invoice'=>$invoice])->layout('livewire.system.template.template')->title('New Invoice');

    }
}
