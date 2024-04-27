<?php

namespace App\Livewire\Machine;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\MachinTypeDetails;

use Livewire\Component;

class MachineType extends Component
{



    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $machin_type_details_id = '';
    #[Validate('required')]
    public $machin_type_details_name = '';

    public $machin_type_details_description = '';

    protected $listeners = ['new_entry',];




    public function save()
    {
        $validated = $this->validate([
            'machin_type_details_name' =>'required|unique:machin_type_details',
            'machin_type_details_description' =>'required',
        ]);

        MachinTypeDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

      }




public function Edit(int $machin_type_details_id){

    $edata=MachinTypeDetails::where('machin_type_details_id',$machin_type_details_id)->first();

  if($edata){
        $this->machin_type_details_id=$edata->machin_type_details_id;
        $this->machin_type_details_name=$edata->machin_type_details_name;
        $this->machin_type_details_description=$edata->machin_type_details_description;
    }
    else{
    }
    $this->dispatch('showeditbranches');
   

}


public function update(){

    $validateDate = $this->validate([
        'machin_type_details_name' =>'required',
        'machin_type_details_description' =>'required',
    ]);

    MachinTypeDetails::where('machin_type_details_id',$this->machin_type_details_id)->update([
       'machin_type_details_name'=>$validateDate['machin_type_details_name'],
       'machin_type_details_description'=>$validateDate['machin_type_details_description']
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}


//reset inputs
public function resetinputs(){
    $this->machin_type_details_name='';
    $this->machin_type_details_description='';
     }




    public function render()
    {

        $data= MachinTypeDetails::paginate(10);
        return view('livewire.machine.machine-type',['data'=> $data])->layout('livewire.system.template.template')->title('Machine Brand');
    }
}
