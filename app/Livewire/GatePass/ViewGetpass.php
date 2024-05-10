<?php

namespace App\Livewire\GatePass;
use App\Models\DeliveryMachineDetails;
use App\Models\DeliverypaddleDetails;
use App\Models\DeliverypIronDetails;
use App\Models\GeatpassDetails;
use App\Models\BoxDetails;
use App\Models\paddleDetails;
use App\Models\IronDetails;
use App\Models\MachinListDetails;
Use App\Models\MachinTypeDetails;
use App\Models\delivery_Othe_Parts;

use Illuminate\Http\Request;


use Livewire\Component;

class ViewGetpass extends Component
{

  public $geatpass_details_number;



  public static function machinnote($machin_list_details_id){
    echo  MachinListDetails::where('machin_list_details_id',$machin_list_details_id)->value('machin_list_details_note').'</br>';
      }

      public static function machinBar($machin_list_details_id){
        echo  MachinListDetails::where('machin_list_details_id',$machin_list_details_id)->value('machin_list_details_barcode').'</br>';
          }

     public static function machintype($machin_type_details_id){
            echo  MachinTypeDetails::where('machin_type_details_id',$machin_type_details_id)->value('machin_type_details_name').'</br>';
              }


  /// box sn
  public static function boxsn($box_details_id){
    if(!empty($box_details_id)){
    echo 'Box SN   :- '. BoxDetails::where('box_details_id',$box_details_id)->value('box_details_serial_number').'</br>';
    }
      }

    /// paddel sn
    public static function paddlesn($paddle_details_id){
        if(!empty($paddle_details_id)){
     echo 'Paddle SN   :- '. paddleDetails::where('paddle_details_id',$paddle_details_id)->value('paddle_details_serial_number').'</br>';
        }
     }

       /// paddel sn
     public static function ironsn($iron_details_id){
        if(!empty($iron_details_id)){
     echo 'Iron SN   :- '. IronDetails::where('iron_details_id',$iron_details_id)->value('iron_details_serial_number').'</br>';
        }
     }




    public function render()
    {


       // $getpassno=GeatpassDetails::where('geatpass_details_number',$this->geatpass_details_number)->value('geatpass_details_number');

        $getpass=GeatpassDetails::join('customers_details','customers_details.customers_id','=','geatpass_details.customers_id')->where('geatpass_details_number','=',$this->geatpass_details_number)->get();

         $Machin =DeliveryMachineDetails::where('delivery_machine_details.geatpass_details_number','=',$this->geatpass_details_number)->get();

        $paddel=DeliverypaddleDetails::where('geatpass_details_number','=',$this->geatpass_details_number)->get();

        $iron=DeliverypIronDetails::where('geatpass_details_number','=',$this->geatpass_details_number)->get();
        $Other=delivery_Othe_Parts::join('othe_parts','othe_parts.othe_parts_id','=','delivery__othe__parts.othe_parts_id')->where('geatpass_details_number','=',$this->geatpass_details_number)->get();



        return view('livewire.gate-pass.view-getpass',[
                                                        'geatpass_details_number'=>$this->geatpass_details_number,
                                                        'getpass'=>$getpass,
                                                        'Machin'=>$Machin,
                                                        'paddel'=>$paddel,
                                                        'iron'=> $iron,
                                                        'Other'=>$Other]);

    }
}
