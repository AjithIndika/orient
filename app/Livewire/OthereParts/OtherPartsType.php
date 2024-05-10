<?php

namespace App\Livewire\OthereParts;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use App\Models\OthePartsType;


class OtherPartsType extends Component
{

    public $othe_parts_types_name;
    public $othe_parts_types_id;

    public function save(){

        $validated = $this->validate([
            'othe_parts_types_name' =>'required|unique:othe_parts_types',
        ]);

        OthePartsType::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
    }



    public function Edit(int $othe_parts_types_id ){

        $edata= OthePartsType::where('othe_parts_types_id',$othe_parts_types_id )->first();

        if($edata){
              $this->othe_parts_types_id=$edata->othe_parts_types_id;
              $this->othe_parts_types_name=$edata->othe_parts_types_name;
          }
          else{
          }
          $this->dispatch('showe');

    }



    public function update(){
        $validateDate = $this->validate([
            'othe_parts_types_name' =>'required',
        ]);
        OthePartsType::where('othe_parts_types_id',$this->othe_parts_types_id)->update([
           'othe_parts_types_name'=>$validateDate['othe_parts_types_name'],
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats');
    }



    public function resetinputs(){
        $this->othe_parts_types_name='';
         }




    public function render()
    {
       $parts= OthePartsType::paginate(10);
       return view('livewire.othere-parts.other-parts-type',['parts'=>$parts])->layout('livewire.system.template.template')->title('Other Parts');
    }
}
