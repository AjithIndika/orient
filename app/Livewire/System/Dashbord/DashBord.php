<?php

namespace App\Livewire\System\Dashbord;
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

class DashBord extends Component
{


    public function paddle(){
        echo paddleDetails::count();
    }

    public function totalMC(){
        echo MachinListDetails::count();
    }


    public function box(){
        echo BoxDetails::count();
    }

    public function iron(){
        echo IronDetails::count();
    }


    public function pendingInvoice(){
        echo 'Not implemented';
    }


    public function thismonthIncome(){
        echo 'Not implemented';

    }




    public function render()
    {
        //return view('livewire.system.dashbord.dash-bord');
        return view('livewire.system.dashbord.dash-bord')->layout('livewire.system.template.template')->title('Dashboard');
    }
}
