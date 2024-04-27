<?php

namespace App\Livewire\Machine;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\MachinBrandDetails;


class MachineBrand extends Component
{

    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $machin_brand_details_id = '';
    #[Validate('required')]
    public $machin_brand_details_name = '';



    public function save()
    {
        $validated = $this->validate([
            'machin_brand_details_name' =>'required|unique:machin_brand_details',
        ]);

        MachinBrandDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
      }




public function Edit(int $machin_brand_details_id){

    $edata=MachinBrandDetails::where('machin_brand_details_id',$machin_brand_details_id)->first();

  if($edata){
        $this->machin_brand_details_id=$edata->machin_brand_details_id;
        $this->machin_brand_details_name=$edata->machin_brand_details_name;
    }
    else{
    }
    $this->dispatch('showeditbranches');
}


public function update(){

    $validateDate = $this->validate([
        'machin_brand_details_name' =>'required',
    ]);

    MachinBrandDetails::where('machin_brand_details_id',$this->machin_brand_details_id)->update([
       'machin_brand_details_name'=>$validateDate['machin_brand_details_name'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}






//reset inputs
public function resetinputs(){
    $this->machin_brand_details_name='';
     }



    public function render()
    {
        $data= MachinBrandDetails::paginate(10);
        return view('livewire.machine.machine-brand',['data'=> $data])->layout('livewire.system.template.template')->title('Machine Brand');
    }
}
