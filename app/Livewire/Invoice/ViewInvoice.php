<?php

namespace App\Livewire\Invoice;

use Livewire\Component;
use App\Models\InvoiceDetails;
use App\Models\InvoiceMacineDetails;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;


class ViewInvoice extends Component
{



    public $viewButton;
    public $invoice_details_number;

public function pdf(){

 $path = 'https://system.orientsewingmachine.lk/image-system/sw.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
$invoice_details_id= InvoiceDetails::where('invoice_details_number',$this->invoice_details_number)->value('invoice_details_id');
 $invoice = json_encode(InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_id',$invoice_details_id)->first());
 $pdf = PDF::loadView('livewire.invoice.view-invoice',['invoice'=>$invoice,'invoice_details_number'=>$this->invoice_details_number,'image'=>$base64])->setPaper('A4')->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled', true]);
      //  return $pdf->stream('report.pdf');
      return response()->streamDownload(function () use($pdf) {
    echo  $pdf->stream();
}, ''.$this->invoice_details_number.'.pdf');



}


    public function render()
    {


 $path = 'https://system.orientsewingmachine.lk/image-system/sw.png';
 $type = pathinfo($path, PATHINFO_EXTENSION);
 $data = file_get_contents($path);
 $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);





       $invoice_details_id= InvoiceDetails::where('invoice_details_number',$this->invoice_details_number)->value('invoice_details_id');

        $invoice = json_encode(InvoiceDetails::join('customers_details','customers_details.customers_id','=','invoice_details.customers_id')->where('invoice_details_id',$invoice_details_id)->first());
       // $in =InvoiceMacineDetails::where('invoice_details_number','=', $this->invoice_details_number)->get();
        return view('livewire.invoice.view-invoice',['invoice'=>$invoice,'invoice_details_number'=>$this->invoice_details_number,'image'=>$base64 ,'viewButton'=>$this->viewButton])->layout('livewire.system.template.template')->title('View Invoice');
    }
}
