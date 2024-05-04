<?php

namespace App\Livewire\RetunGeatPass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\paddleDetails;
use App\Models\GeatpassTempDetails;
use App\Models\GeatpassDetails;
use App\Models\CustomersDetails;
use App\Models\MachinListDetails;
use App\Models\TempRetunGetpassDetails;
use App\Models\RetunGetpassDetails;

use Livewire\Component;

class SelectReturnCustomer extends Component
{
   public $geatpass_temp_details_id;

    public $tempGetpassid;

    public $customers_details;
    public $customers_id;

    public $geatpass_temp_details_vehicle;

    public $geatpass_temp_details_driver_name;

    public $geatpass_temp_details_driver_nic;

    public $geatpass_temp_details_driver_mobile;

    public $geatpass_temp_details_Number;
    public $return_gatepass_number;
    public $gatepass_number;






    public function tempsave(){

        $validateDate = $this->validate([
            'customers_id' =>'required',
            'geatpass_temp_details_vehicle' =>'required',
            'geatpass_temp_details_driver_name' =>'required',
            'geatpass_temp_details_driver_nic' =>'required',
            'geatpass_temp_details_driver_mobile' =>'required',
            'gatepass_number' =>'required',
        ]);

         //  dd($this->tempGetpassid);
         if(!empty(RetunGetpassDetails::orderBy('retun_geatpass_details_number', 'desc')->value('retun_geatpass_details_number'))){
            $p=RetunGetpassDetails::orderBy('retun_geatpass_details_number', 'desc')->value('retun_geatpass_details_number');
            $er=explode("-",$p);
            $pnumber='ORRN-'.str_pad($er['1']+1, 8, '0', STR_PAD_LEFT);
         }
               else {
                 $pnumber='ORRN-'.str_pad(1, 8, '0', STR_PAD_LEFT);
          }




/*
        TempRetunGetpassDetails::create([
            'tempGetpassid'=>$tempretungetpass,
            'customers_id' =>$this->customers_id,
            'geatpass_temp_details_vehicle' =>$this->geatpass_temp_details_vehicle,
            'geatpass_temp_details_driver_name' =>$this->geatpass_temp_details_driver_name,
            'geatpass_temp_details_driver_nic' =>$this->geatpass_temp_details_driver_nic,
            'geatpass_temp_details_driver_mobile' =>$this->geatpass_temp_details_driver_mobile,
            'geatpass_temp_details_Number'=>$this->geatpass_temp_details_Number,
        ]);
*/

//dump($this->gatepass_number);

        RetunGetpassDetails::create([
            'retun_geatpass_details_number'=>$pnumber,
            'retun_geatpass_details_number_hash' =>$this->customers_id,
            'retun_customers_id' =>$this->customers_id,
            'retun_geatpass_details_vehicle' =>$this->geatpass_temp_details_vehicle,
            'retun_geatpass_details_driver_name' =>$this->geatpass_temp_details_driver_name,
            'retun_geatpass_details_driver_nic' =>$this->geatpass_temp_details_driver_nic,
            'retun_geatpass_details_driver_mobile'=>$this->geatpass_temp_details_driver_mobile,
            'return_gatepass_number'=>$this->gatepass_number,
            'retun_geatpass_details_crate_by'=>Auth::user()->name,
        ]);



        toastr()->success('Customer Select and redirect to add items successfully!', 'Congrats');
       return redirect()->to('/new-return-getpass'.'/'.$pnumber);
    }

    public function modelData()
    {
        return [
            'tempGetpassid'=>str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
            'customers_id' =>$this->customers_id,
            'geatpass_temp_details_vehicle' =>$this->geatpass_temp_details_vehicle,
            'geatpass_temp_details_driver_name' =>$this->geatpass_temp_details_driver_name,
            'geatpass_temp_details_driver_nic' =>$this->geatpass_temp_details_driver_nic,
            'geatpass_temp_details_driver_mobile' =>$this->geatpass_temp_details_driver_mobile,
            //'customers_register_user'=>Auth::user()->name,
        ];


    }


    public function render()
    {

        $custamers= CustomersDetails::all();
       // return view('livewire.retun-geat-pass.select-return-customer');
       return view('livewire.retun-geat-pass.select-return-customer',['custamers'=>$custamers])->layout('livewire.system.template.template')->title('Select Customer');
    }
}
