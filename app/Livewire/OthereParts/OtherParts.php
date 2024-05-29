<?php

namespace App\Livewire\OthereParts;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use App\Models\OtheParts;
use App\Models\OthePartsType;

class OtherParts extends Component
{

    public $othe_parts_id ;
    public $othe_parts_types_id;
    public $othe_parts_name;
    public $othe_parts_sn;
    public $othe_parts_daily_rate;

    public $othe_parts_types_name;

    public function save(){

        $validated = $this->validate([
            'othe_parts_types_id' =>'required',
            'othe_parts_sn' =>'required|unique:othe_parts',
            'othe_parts_name' =>'required',
            'othe_parts_daily_rate'=>'numeric',
        ]);

        OtheParts::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
    }




    public function Edit(int $othe_parts_id){

        $edata= OtheParts::where('othe_parts_id',$othe_parts_id )->first();

        if($edata){
              $this->othe_parts_types_id=$edata->othe_parts_types_id;
              $this->othe_parts_sn=$edata->othe_parts_sn;
              $this->othe_parts_name=$edata->othe_parts_name;
              $this->othe_parts_daily_rate=$edata->othe_parts_daily_rate;
              $this->othe_parts_id=$edata->othe_parts_id;
          }
          else{
          }
          $this->dispatch('showe');

    }



    public function update(){
        $validateDate = $this->validate([
            'othe_parts_types_id' =>'required',
            'othe_parts_sn' =>'required',
            'othe_parts_name' =>'',
            'othe_parts_daily_rate'=>'numeric',
        ]);
        OtheParts::where('othe_parts_id',$this->othe_parts_id)->update([
           'othe_parts_types_id'=>$validateDate['othe_parts_types_id'],
           'othe_parts_sn'=>$validateDate['othe_parts_sn'],
           'othe_parts_name'=>$validateDate['othe_parts_name'],
           'othe_parts_daily_rate'=>$validateDate['othe_parts_daily_rate'],
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats');
    }



    public function partsName($othe_parts_types_id){
        echo  OthePartsType::where('othe_parts_types_id','=',$this->othe_parts_types_id)->value('othe_parts_types_name');

    }





    public function resetinputs(){
        $this->othe_parts_types_id='';
        $this->othe_parts_name='';
        $this->othe_parts_sn='';
        $this->othe_parts_daily_rate='';
         }



    public function render()
    {

        $parts= OtheParts::join('othe_parts_types','othe_parts_types.othe_parts_types_id','=','othe_parts.othe_parts_types_id')->paginate(10);
        $partType=OthePartsType::all();

        return view('livewire.othere-parts.other-parts',['parts'=>$parts,'partType'=>$partType])->layout('livewire.system.template.template')->title('Other Parts');
    }
}
