<?php

namespace App\Livewire\Box;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\BoxDetails;

use Livewire\Component;

class Box extends Component
{

    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $box_details_id = '';
    #[Validate('required')]
    public $box_details_name = '';

    #[Validate('required')]
    public $box_details_status = '';



    public $box_details_serial_number= '';

    protected $listeners = ['new_entry',];




    public function save()
    {
        $validated = $this->validate([
            'box_details_name' =>'required',
            'box_details_serial_number' =>'required|unique:box_details',
            'box_details_status'=>'',
        ]);

        BoxDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

      }




public function Edit(int $box_details_id){

    $edata=BoxDetails::where('box_details_id',$box_details_id)->first();

  if($edata){
        $this->box_details_id=$edata->box_details_id;
        $this->box_details_name=$edata->box_details_name;
        $this->box_details_serial_number=$edata->box_details_serial_number;
        $this->box_details_status=$edata->box_details_status;
    }
    else{
    }
    $this->dispatch('showeditbranches');


}


public function update(){

    $validateDate = $this->validate([
        'box_details_name' =>'required',
        'box_details_serial_number' =>'required',
    ]);

    BoxDetails::where('box_details_id',$this->box_details_id)->update([
       'box_details_name'=>$validateDate['box_details_name'],
       'box_details_serial_number'=>$validateDate['box_details_serial_number']
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}


//reset inputs
public function resetinputs(){
    $this->box_details_name='';
    $this->box_details_serial_number='';
     }




    public function render()
    {
       // return view('');
       $data= boxDetails::paginate(10);
       return view('livewire.box.box',['data'=> $data])->layout('livewire.system.template.template')->title('Box');
    }
}
