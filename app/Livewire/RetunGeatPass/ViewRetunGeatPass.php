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



class ViewRetunGeatPass extends Component
{

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


    
    public function render()
    {

      //  dump($this->retun_geatpass_details_number);

      $retungetpass=  RetunGetpassDetails::join('customers_details','customers_details.customers_id','=','retun_getpass_details.retun_customers_id')->where('retun_geatpass_details_number','=',$this->retun_geatpass_details_number)->get();
//dump( $this->retun_geatpass_details_number);

        return view('livewire.retun-geat-pass.view-retun-geat-pass',['getpass'=>$retungetpass,'retunnumber'=>$this->retun_geatpass_details_number])->layout('livewire.system.template.template')->title(''.$this->retun_geatpass_details_number.' Geat Pass');

    }
}
