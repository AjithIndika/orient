<?php

namespace App\Livewire\RetunGeatPass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\RetunGetpassDetails;



use Livewire\Component;

class RetunGeatPassList extends Component
{
    public function render()
    {

        $geatP=RetunGetpassDetails::join('customers_details','customers_details.customers_id','=','retun_getpass_details.retun_customers_id')->get();


        return view('livewire.retun-geat-pass.retun-geat-pass-list',['retun'=> $geatP])->layout('livewire.system.template.template')->title('Retun Getpass List');
    }
}
