<?php

namespace App\Livewire\Iron;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\IronDetails;
use App\Models\Retun_box_details;
use App\Models\Retun_iron_details;
use App\Models\Retun_paddle_details;



use Livewire\Component;

class Iron extends Component
{



    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $iron_details_id = '';
    #[Validate('required')]
    public $iron_details_name = '';

    public $iron_details_serial_number = '';
    public $iron_details_status = '';

    protected $listeners = ['new_entry',];




    public function save()
    {
        $validated = $this->validate([
            'iron_details_name' =>'required',
            'iron_details_serial_number' =>'required|unique:iron_details',
            'iron_details_status'=>''
        ]);

        IronDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

      }




public function Edit(int $iron_details_id){

    $edata=IronDetails::where('iron_details_id',$iron_details_id)->first();

  if($edata){
        $this->iron_details_id=$edata->iron_details_id;
        $this->iron_details_name=$edata->iron_details_name;
        $this->iron_details_serial_number=$edata->iron_details_serial_number;
        $this->iron_details_status=$edata->iron_details_status;
    }
    else{
    }
    $this->dispatch('showeditbranches');


}


public function update(){

    $validateDate = $this->validate([
        'iron_details_name' =>'required',
        'iron_details_serial_number' =>'required',
        'iron_details_status'=>''
    ]);

    IronDetails::where('iron_details_id',$this->iron_details_id)->update([
       'iron_details_name'=>$validateDate['iron_details_name'],
       'iron_details_serial_number'=>$validateDate['iron_details_serial_number'],
       'iron_details_status'=>$validateDate['iron_details_status']
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}


//reset inputs
public function resetinputs(){
    $this->iron_details_name='';
    $this->iron_details_serial_number='';
     }





    public function render()
    {
       // return view('livewire.iron.iron');
       $data= IronDetails::paginate(10);
       return view('livewire.iron.iron',['data'=> $data])->layout('livewire.system.template.template')->title('Machine Brand');
    }
}
