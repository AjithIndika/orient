<?php

namespace App\Livewire\Machine;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;

use App\Models\MachinModelDetails;

use Livewire\Component;

class MachineModel extends Component
{



    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $machin_model_details_id = '';
    #[Validate('required')]
    public $machin_model_details_name = '';



    public function save()
    {
        $validated = $this->validate([
            'machin_model_details_name' =>'required|unique:machin_model_details',
        ]);

        MachinModelDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
      }




public function Edit(int $machin_model_details_id){

    $edata=MachinModelDetails::where('machin_model_details_id',$machin_model_details_id)->first();

  if($edata){
        $this->machin_model_details_id=$edata->machin_model_details_id;
        $this->machin_model_details_name=$edata->machin_model_details_name;
    }
    else{
    }
    $this->dispatch('showeditbranches');
}


public function update(){

    $validateDate = $this->validate([
        'machin_model_details_name' =>'required',
    ]);

    MachinModelDetails::where('machin_model_details_id',$this->machin_model_details_id)->update([
       'machin_model_details_name'=>$validateDate['machin_model_details_name'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}






//reset inputs
public function resetinputs(){
    $this->machin_model_details_name='';
     }



    public function render()
    {

        $data= MachinModelDetails::paginate(10);
        return view('livewire.machine.machine-model',['data'=> $data])->layout('livewire.system.template.template')->title('Machine Brand');
    }
}
