<?php

namespace App\Livewire\GatePass;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\GeatpassTempDetails;
use App\Models\GeatpassDetails;
use Livewire\WithPagination;

use Exception;
use Illuminate\Contracts\View\Factory;

use Livewire\Component;

class GeatPassList extends Component
{


 public   $searchTerm;
 use WithPagination;



    public function render(){

      // $query = '%'.$this->searchTerm.'%';

        $getpass=	GeatpassDetails::join('customers_details','customers_details.customers_id','=','geatpass_details.customers_id')
                                     // ->where('geatpass_details_number', 'like', '%'. $this->searchTerm.'%')
    									//  ->orWhere('customers_details.customers_name', 'like', '%'. trim($this->searchTerm).'%')
    						          //  ->paginate(10);
                                      ->get();

                            /*
 'searchList' => GeatpassDetails::join('customers_details','customers_details.customers_id','=','geatpass_details.customers_id')
                                      ->where('geatpass_details_number', 'like', '%'. $this->searchTerm.'%')
                                      //where('schlagwort', 'like', '%' . trim($this->searchInput) . '%')
                ->orderBy('geatpass_details_number', 'desc')->paginate(10),

*/





      //  $getpass=GeatpassDetails::join('customers_details','customers_details.customers_id','=','geatpass_details.customers_id')->get();
        return view('livewire.gate-pass.geat-pass-list',['getpass'=>$getpass,'serch'=> $this->searchTerm],
        )->layout('livewire.system.template.template')->title('Geat Pass List');
    }
}
