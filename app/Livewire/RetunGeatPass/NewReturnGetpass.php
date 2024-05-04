<?php

namespace App\Livewire\RetunGeatPass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\paddleDetails;
use App\Models\GeatpassDetails;
use App\Models\CustomersDetails;
use App\Models\MachinListDetails;
use App\Models\TempRetunGetpassDetails;
use App\Models\DeliveryMachineDetails;
use Illuminate\Http\Request;
use App\Models\BoxDetails;
use App\Models\IronDetails;
use Illuminate\Support\Str;
use App\Models\LogDetails;
use App\Models\RetunGetpassDetails;
use App\Models\Retun_paddle_details;
use App\Models\Retun_box_details;
use App\Models\Retun_iron_details;
use App\Models\Retun_machine_details;

use App\Models\DeliverypaddleDetails;
use App\Models\DeliverypIronDetails;
use Livewire\Component;

class NewReturnGetpass extends Component
{
    public $geatpass_details_number;

    public $customers_id;
    public $box_details_id;
    public $delivery_machine_details_id;

    public $machin_list_details_id;
    public $dispatchBrowserEvent;
    public $paddle_details_id;
    public $iron_details_id;
    public $tempGetpassid;

    public $tem_customers_id;
    public $retun_geatpass_details_number;

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



    /// paddel sn
    public static function machin($machin_list_details_id)
    {
        echo MachinListDetails::where('machin_list_details_id', $machin_list_details_id)->value('machin_list_details_barcode');
    }



    // machin atach box
    public function boxshowmachin(int $delivery_machine_details_id)
    {
        $edata = DeliveryMachineDetails::where('delivery_machine_details_id', $delivery_machine_details_id)->first();
        if ($edata) {
            $this->box_details_id = $edata->box_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->delivery_machine_details_id = $edata->delivery_machine_details_id;
            $this->geatpass_details_number = $edata->geatpass_details_number;
            $this->customers_id = $edata->customers_id;

        } else {
        }
        $this->dispatch('MC-boxShowe-modal');
    }

    public function mCBoxconfrom()
    {
        $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');
        $machin_list_details_barcode = MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->value('machin_list_details_barcode');
        $atchDevice = BoxDetails::where('box_details_id', $this->box_details_id)->value('box_details_serial_number');
        DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['box_details_recive_date' => date('Y-m-d H:i:s'), 'box_details_recive_by' => Auth::user()->name]);
        BoxDetails::where('box_details_id', $this->box_details_id)->update(['box_details_status' => '', 'deliveryNote_id' => '']);
        LogDetails::create(['logdetails' => 'Machine  ' . $machin_list_details_barcode . ' attach box  ' . $atchDevice . ' returned and it updated ', 'logdetails_ad_user' => Auth::user()->name]);

        Retun_box_details::create(['retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
        'geatpass_details_number'=>$this->geatpass_details_number,
        'box_details_id'=>$this->box_details_id,
        'customers_id'=> $this->customers_id,
        'return_delivery_note_number'=> $repassno,
        'return_delivery_note_date'=> date('Y-m-d H:i:s'),
        'return_by'=> Auth::user()->name]);
        toastr()->success('machine attach box returned and it updated!', 'Congrats');
    }

    // machin attach paddle
    public function paddleshowmachin($delivery_machine_details_id)
    {
        $edata = DeliveryMachineDetails::where('delivery_machine_details_id', $delivery_machine_details_id)->first();
        if ($edata) {
            $this->paddle_details_id = $edata->paddle_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->delivery_machine_details_id = $edata->delivery_machine_details_id;
            $this->geatpass_details_number = $edata->geatpass_details_number;
            $this->customers_id = $edata->customers_id;
        } else {
        }
        $this->dispatch('MC-PaddleShowe-modal');
    }

    public function mCpaddleconfrom()
    {
        $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');
        $machin_list_details_barcode = MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->value('machin_list_details_barcode');
        $atchDevice = paddleDetails::where('paddle_details_id', $this->paddle_details_id)->value('paddle_details_serial_number');
        DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['paddle_details_recive_date' => date('Y-m-d H:i:s'), 'paddle_details_recive_by' => Auth::user()->name]);
        paddleDetails::where('paddle_details_id', $this->paddle_details_id)->update(['paddle_details_status' => '', 'deliveryNote_id' => '']);
        LogDetails::create(['logdetails' => 'Machine  ' . $machin_list_details_barcode . ' attach Paddle ' . $atchDevice . ' returned and it updated ', 'logdetails_ad_user' => Auth::user()->name]);
        Retun_paddle_details::create(['retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
                                       'geatpass_details_number'=>$this->delivery_machine_details_id,
                                       'paddle_details_id'=>$this->paddle_details_id,
                                       'paddle_daily_rent'=>'',
                                       'customers_id'=> $this->customers_id,
                                       'return_delivery_note_number'=> $repassno,
                                       'return_delivery_note_date'=> date('Y-m-d H:i:s'),
                                       'return_by'=> Auth::user()->name
                                    ]);
        toastr()->success('machine attach box returned and it updated!', 'Congrats');
    }


    // machin attach iron
    public function ironshowmachin($delivery_machine_details_id)
    {
        $edata = DeliveryMachineDetails::where('delivery_machine_details_id', $delivery_machine_details_id)->first();
        if ($edata) {
            $this->iron_details_id = $edata->iron_details_id;
            $this->machin_list_details_id = $edata->machin_list_details_id;
            $this->delivery_machine_details_id = $edata->delivery_machine_details_id;
            $this->geatpass_details_number = $edata->geatpass_details_number;
            $this->customers_id=$edata->customers_id;

        } else {
        }
        $this->dispatch('MC-ironShowe-modal');
    }

    public function mCironeconfrom()
    {


        $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');
        $machin_list_details_barcode = MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->value('machin_list_details_barcode');
        $atchDevice = IronDetails::where('iron_details_id', $this->iron_details_id)->value('iron_details_serial_number');
        DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['iron_details_recive_date' => date('Y-m-d H:i:s'), 'iron_details_recive_by' => Auth::user()->name]);
        IronDetails::where('iron_details_id', $this->iron_details_id)->update(['iron_details_status' => '', 'deliveryNote_id' => '']);
        LogDetails::create(['logdetails' => 'Machine  ' . $machin_list_details_barcode . ' attach Iron ' . $atchDevice . ' returned and it updated ', 'logdetails_ad_user' => Auth::user()->name]);


        Retun_iron_details::create(['retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
        'geatpass_details_number'=>$this->geatpass_details_number,
        'iron_details_id'=>$this->iron_details_id,
        'customers_id'=> $this->customers_id,
        'return_delivery_note_number'=> $repassno,
        'return_delivery_note_date'=> date('Y-m-d H:i:s'),
        'return_by'=> Auth::user()->name
     ]);

        toastr()->success('machine attach box returned and it updated!', 'Congrats');
    }


public function mcretun($delivery_machine_details_id){
    $edata = DeliveryMachineDetails::where('delivery_machine_details_id', $delivery_machine_details_id)->first();
    if ($edata) {
        $this->iron_details_id = $edata->iron_details_id;
        $this->paddle_details_id = $edata->paddle_details_id;
        $this->box_details_id = $edata->box_details_id;
        $this->machin_list_details_id = $edata->machin_list_details_id;
        $this->delivery_machine_details_id = $edata->delivery_machine_details_id;
        $this->geatpass_details_number = $edata->geatpass_details_number;


    } else {
    }
    $this->dispatch('MC-retun-modal');

}



public function mcretunconf(){
    // iron retun

    $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');

    if(!empty($this->iron_details_id)){
        DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['iron_details_recive_date' => date('Y-m-d H:i:s'), 'iron_details_recive_by' => Auth::user()->name]);
        IronDetails::where('iron_details_id', $this->iron_details_id)->update(['deliveryNote_id' => '']);
        $atchDevice = IronDetails::where('iron_details_id', $this->iron_details_id)->value('iron_details_serial_number');
        }

        if(!empty($this->paddle_details_id)){
            $atchDevice = paddleDetails::where('paddle_details_id', $this->paddle_details_id)->value('paddle_details_serial_number');
            DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['paddle_details_recive_date' => date('Y-m-d H:i:s'), 'paddle_details_recive_by' => Auth::user()->name]);
            paddleDetails::where('paddle_details_id', $this->paddle_details_id)->update(['deliveryNote_id' => '']);
            }

            if(!empty($this->box_details_id)){
                $machin_list_details_barcode = MachinListDetails::where('machin_list_details_id', $this->machin_list_details_id)->value('machin_list_details_barcode');
                $atchDevice = BoxDetails::where('box_details_id', $this->box_details_id)->value('box_details_serial_number');
                DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['box_details_recive_date' => date('Y-m-d H:i:s'), 'box_details_recive_by' => Auth::user()->name]);
                BoxDetails::where('box_details_id', $this->box_details_id)->update(['deliveryNote_id' => '']);
       }

       DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->update(['return_delivery_note_number' => $repassno,'return_delivery_note_date'=>date('Y-m-d H:i:s'), 'box_details_recive_by' => Auth::user()->name]);
       MachinListDetails::where('machin_list_details_id','=',$this->machin_list_details_id)->update(['machin_list_details_status'=>'']);
       //full mashin reten
    //   Retun_machine_details

   $deliveryMachinDetails= DeliveryMachineDetails::where('delivery_machine_details_id', $this->delivery_machine_details_id)->get();
 foreach($deliveryMachinDetails as $deMCDetails){
    Retun_machine_details::create([
    'retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
    'geatpass_details_number'=>$deMCDetails->geatpass_details_number,
    'machin_list_details_id'=>$deMCDetails->machin_list_details_id,
    'customers_id'=>$deMCDetails->customers_id,
    'box_details_id'=>$deMCDetails->box_details_id,
    'box_details_recive_date'=> $deMCDetails->box_details_recive_date,
    'box_details_recive_by'=>$deMCDetails->box_details_recive_by,
    'paddle_details_id'=> $deMCDetails->paddle_details_id,
    'paddle_details_recive_date'=>$deMCDetails->paddle_details_recive_date,
    'paddle_details_recive_by'=>$deMCDetails->paddle_details_recive_by,
    'iron_details_id'=> $deMCDetails->iron_details_id,
    'iron_details_recive_date'=> $deMCDetails->iron_details_recive_date,
    'iron_details_recive_by'=>$deMCDetails->iron_details_recive_by,
    'machin_list_details_daily_rent'=>$deMCDetails->machin_list_details_daily_rent,
    'branches_id'=> $deMCDetails->branches_id,
    'delivery_machine_details_user'=>$deMCDetails->delivery_machine_details_user,
    'delivery_machine_details_date'=>$deMCDetails->delivery_machine_details_date,
    'return_delivery_note_number'=> $deMCDetails->return_delivery_note_number,
    'return_delivery_note_date'=> date('Y-m-d H:i:s'),
    'return_delivery_recive_by'=> Auth::user()->name
 ]); }
   // LogDetails::create(['logdetails' => 'Machine  ' . $machin_list_details_barcode . ' attach Iron ' . $atchDevice . ' returned and it updated ', 'logdetails_ad_user' => Auth::user()->name]);
toastr()->success('machine attach box returned and it updated!', 'Congrats');
}


public $deliverypaddle_details_id;

public function paddleshow($deliverypaddle_details_id){
//use App\Models\DeliverypaddleDetails;
 ///use App\Models\DeliverypIronDetails;


    $edata = DeliverypaddleDetails::join('paddle_details','paddle_details.paddle_details_id','=','deliverypaddle_details.paddle_details_id')->where('deliverypaddle_details_id',$deliverypaddle_details_id)->first();
    if ($edata) {
        $this->paddle_details_id = $edata->paddle_details_id;
        $this->paddle_details_serial_number = $edata->paddle_details_serial_number;
        $this->deliverypaddle_details_id = $edata->deliverypaddle_details_id;
    } else {
    }
    $this->dispatch('PaddleShowe-modal');

}



public function paddlereciveConfrom(){
    $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');
        $atchDevice = paddleDetails::where('paddle_details_id', $this->paddle_details_id)->value('paddle_details_serial_number');
        DeliverypaddleDetails::where('deliverypaddle_details_id', $this->deliverypaddle_details_id)->update(['return_delivery_note_date' => date('Y-m-d H:i:s'), 'return_delivery_note_number'=>$this->retun_geatpass_details_number,'return_delivery_note_by' => Auth::user()->name]);
        paddleDetails::where('paddle_details_id', $this->paddle_details_id)->update(['paddle_details_status' => '', 'deliveryNote_id' => '']);
   $pdDetails= DeliverypaddleDetails::where('deliverypaddle_details_id', $this->deliverypaddle_details_id)->get();
   foreach($pdDetails as $padlD){
       Retun_paddle_details::create(['retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
                                       'geatpass_details_number'=>$padlD->geatpass_details_number,
                                       'paddle_details_id'=> $padlD->paddle_details_id,
                                       'customers_id'=> $padlD->customers_id,
                                       'paddle_daily_rent'=> $padlD->paddle_daily_rent,
                                       'return_delivery_note_number'=> $repassno,
                                       'return_delivery_note_date'=> date('Y-m-d H:i:s'),
                                       'return_by'=> Auth::user()->name
                                    ]);
                                }
        toastr()->success('Paddle returned and it updated!', 'Congrats');

}


public $deliveryp_iron_details_id;

//iron retun
public function IronReciveShow($deliveryp_iron_details_id){


   // dump($deliveryp_iron_details_id);


         $edata = DeliverypIronDetails::join('iron_details','iron_details.iron_details_id','=','deliveryp_iron_details.iron_details_id')->where('deliveryp_iron_details.deliveryp_iron_details_id',$deliveryp_iron_details_id)->first();
        if ($edata) {
            $this->iron_details_id = $edata->iron_details_id;
            $this->iron_details_serial_number= $edata->iron_details_serial_number;
            $this->deliveryp_iron_details_id = $edata->deliveryp_iron_details_id;
          //  $this->deliveryp_iron_details_id = $edata->deliveryp_iron_details_id;
        } else {
        }
        $this->dispatch('iron-modal-view');
    }



    public function IronReciveConfrom(){


      //  dump($this->iron_details_id);

        $repassno = RetunGetpassDetails::where('retun_geatpass_details_number', $this->retun_geatpass_details_number)->value('return_gatepass_number');
        // $atchDevice = DeliverypIronDetails::where('iron_details_id', $this->iron_details_id)->value('iron_details_serial_number');
            DeliverypIronDetails::where('deliveryp_iron_details_id', $this->deliveryp_iron_details_id)->update(['return_delivery_note_date' => date('Y-m-d H:i:s'), 'return_delivery_note_number'=>$this->retun_geatpass_details_number,'return_delivery_note_by' => Auth::user()->name]);
            IronDetails::where('iron_details_id', $this->iron_details_id)->update(['iron_details_status' => '', 'deliveryNote_id' => '']);
       $pdDetails= DeliverypIronDetails::where('deliveryp_iron_details_id', $this->deliveryp_iron_details_id)->get();
       foreach($pdDetails as $padlD){
        Retun_iron_details::create(['retun_geatpass_details_number'=>$this->retun_geatpass_details_number,
                                   'geatpass_details_number'=>$padlD->geatpass_details_number,
                                           'iron_details_id'=> $padlD->iron_details_id,
                                           'customers_id'=> $padlD->customers_id,
                                           'iron_daily_rent'=> $padlD->iron_daily_rent,
                                           'return_delivery_note_number'=> $repassno,
                                           'return_delivery_note_date'=> date('Y-m-d H:i:s'),
                                           'return_by'=> Auth::user()->name
                                        ]);
                                    }
            toastr()->success('Iron returned and it updated!', 'Congrats');

    }




    public function render()
    {


     $tem_customers_id=   RetunGetpassDetails::where('retun_geatpass_details_number','=' ,$this->retun_geatpass_details_number)->value('retun_customers_id');
        $getpassNumbes = GeatpassDetails::where('geatpass_details.customers_id', '=', $tem_customers_id)->get();
        return view('livewire.retun-geat-pass.new-return-getpass', ['customers_unic_id' => $tem_customers_id, 'getpassNumbes' => $getpassNumbes,'retungetpass'=>$this->retun_geatpass_details_number])
            ->layout('livewire.system.template.template')
            ->title('Retun Getpass');
    }
}
