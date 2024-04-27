<?php

namespace App\Livewire\GatePass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\GeatpassTempDetails;
use App\Models\GeatpassDetails;
use App\Models\CustomersDetails;
use App\Models\MachinListDetails;


use Livewire\Component;

class SelectCustomerFrom extends Component
{


    public $geatpass_temp_details_id;

    public $tempGetpassid;

    public $customers_details;

    public $geatpass_temp_details_vehicle;

    public $geatpass_temp_details_driver_name;

    public $geatpass_temp_details_driver_nic;

    public $geatpass_temp_details_driver_mobile;


    public function tempsave(){

        $validateDate = $this->validate([
            'customers_details' =>'required',
            'geatpass_temp_details_vehicle' =>'required',
            'geatpass_temp_details_driver_name' =>'required',
            'geatpass_temp_details_driver_nic' =>'required',
            'geatpass_temp_details_driver_mobile' =>'required',
        ]);

        GeatpassTempDetails::create($this->modelData());
        toastr()->success('Customer Select and redirect to add items successfully!', 'Congrats');
        return redirect()->to('/new-getpass'.'/'.str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT));


    }




    public function modelData()
    {
        return [
            'tempGetpassid'=>str_pad(date('ymdhms'), 8, '0', STR_PAD_LEFT),
            'customers_id' =>$this->customers_details,
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
       return view('livewire.gate-pass.select-customer-from',['custamers'=>$custamers])->layout('livewire.system.template.template')->title('New Geat Pass');
    }
}
