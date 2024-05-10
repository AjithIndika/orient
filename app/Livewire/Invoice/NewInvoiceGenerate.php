<?php

namespace App\Livewire\Invoice;

use Livewire\Component;
use App\Models\DeliveryMachineDetails;
use App\Models\CustomersDetails;
use App\Models\InvoiceDetails;
use App\Models\InvoiceMacineDetails;
use Carbon\Carbon;

class NewInvoiceGenerate extends Component
{

    public $customers_id;
    public   $diff_in_days;
    public function render()
    {


        $expenses = DeliveryMachineDetails::query()
    ->select('customers_id','geatpass_details_number','delivery_machine_details_id' )
    ->where('last_invoice_date','=',null)
    ->orwhere('return_delivery_note_date','=',null)
    ->orwhere('return_delivery_note_date','=<',date('Y-m-d H:i:s'))
    ->groupBy(['customers_id','delivery_machine_details_id','geatpass_details_number'])
    ->get();
foreach( $expenses as $delivery){
 $cus=CustomersDetails::where('customers_id','=',$delivery->customers_id)->get();

 foreach($cus as $cs){
    if(!empty(InvoiceDetails::orderBy('invoice_details_number', 'desc')->value('invoice_details_number'))){
        $p=InvoiceDetails::orderBy('invoice_details_number', 'desc')->value('invoice_details_number');
        $er=explode("-",$p);
        $pnumber='ORIN-'.str_pad($er['1']+1, 8, '0', STR_PAD_LEFT);
     }
           else {
             $pnumber='ORIN-'.str_pad(1, 8, '0', STR_PAD_LEFT);
      }

      InvoiceDetails::create([
        'invoice_details_number'=>$pnumber,
        'customers_id'=>$delivery->customers_id,
      ]);

     $macD= DeliveryMachineDetails::where('delivery_machine_details_id','=',$delivery->delivery_machine_details_id)->get();
     foreach($macD as $MA){

       // crating invoice last invoice date
       if(!empty($MA->last_invoice_date)){
        $to = Carbon::createFromFormat('Y-m-d H:s:i',$MA->last_invoice_date);
        $from = Carbon::createFromFormat('Y-m-d H:s:i',$MA->return_delivery_note_date);
        $diff_in_days = $from->diffInDays($to);
        echo $pnumber.'  last invoice date '.round($diff_in_days, 0);
       }

      /// crate retun delivery note date
       if(!empty($MA->return_delivery_note_date)){
        $to = Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d H:s:i'));
        $from = Carbon::createFromFormat('Y-m-d H:s:i',date('Y-m-d H:s:i', strtotime($MA->return_delivery_note_date)));
        $diff_in_days =  $from->diffInDays($to);
        echo $pnumber.'  invoice '.round($diff_in_days, 0);

       }

       // crate invoice normal
       else{
        $to = Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d H:s:i'));
        $from = Carbon::createFromFormat('Y-m-d H:s:i',date('Y-m-d H:s:i', strtotime($MA->delivery_machine_details_date)));
        $diff_in_days =  $from->diffInDays($to);
        echo $pnumber.'  invoice '.round($diff_in_days, 0);

       }



       }

       InvoiceMacineDetails::create([
       'invoice_details_number'=>$pnumber,
       'geatpass_details_number'=>$MA->geatpass_details_number,
       'machin_list_details_id'=>$MA->machin_list_details_id,
       'customers_id'=>$MA->customers_id,
       'box_details_id'=>$MA->box_details_id,
       'box_details_recive_date'=>$MA->box_details_recive_date,
       'box_details_recive_by'=>$MA->box_details_recive_by,
       'machin_type_details_id'=>$MA->machin_type_details_id,
       'paddle_details_id'=>$MA->paddle_details_id,
       'paddle_details_recive_date'=>$MA->paddle_details_recive_date,
       'paddle_details_recive_by'=>$MA->paddle_details_recive_by,
       'iron_details_id'=>$MA->iron_details_id,
       'iron_details_recive_date'=>$MA->iron_details_recive_date,
       'iron_details_recive_by'=>$MA->iron_details_recive_by,
       'machin_list_details_daily_rent'=>$MA->machin_list_details_daily_rent,
       'branches_id'=>$MA->branches_id,
       'delivery_machine_details_user'=>$MA->delivery_machine_details_user,
       'delivery_machine_details_date'=>$MA->delivery_machine_details_date,
       'last_invoice_date'=>$MA->last_invoice_date,
       'return_delivery_note_number'=>$MA->return_delivery_note_number,
       'return_delivery_note_date'=>$MA->return_delivery_note_date,
       'return_delivery_recive_by'=>$MA->return_delivery_recive_by,
       'used_date'=>round($diff_in_days, 0),
       'cost_of_used_date'=>round($diff_in_days*$MA->machin_list_details_daily_rent, 0)  ,
       'invoice_date'=>date('Y-m-d H:i:s'),
       ]);
     }



}





        return view('livewire.invoice.new-invoice-generate');
    }
}
