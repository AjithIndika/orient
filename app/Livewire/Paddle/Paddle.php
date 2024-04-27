<?php

namespace App\Livewire\Paddle;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use App\Models\paddleDetails;

use Livewire\Component;

class Paddle extends Component
{


    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $paddle_details_id = '';
    #[Validate('required')]
    public $paddle_details_name = '';

    public $paddle_details_serial_number = '';
    public $paddle_details_status = '';

    protected $listeners = ['new_entry',];




    public function save()
    {
        $validated = $this->validate([
            'paddle_details_name' =>'required',
            'paddle_details_serial_number' =>'required|unique:paddle_details',
            'paddle_details_status'=>''
        ]);

        PaddleDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

      }




public function Edit(int $paddle_details_id){

    $edata=PaddleDetails::where('paddle_details_id',$paddle_details_id)->first();

  if($edata){
        $this->paddle_details_id=$edata->paddle_details_id;
        $this->paddle_details_name=$edata->paddle_details_name;
        $this->paddle_details_serial_number=$edata->paddle_details_serial_number;
        $this->paddle_details_status=$edata->paddle_details_status;
    }
    else{
    }
    $this->dispatch('showeditbranches');


}


public function update(){

    $validateDate = $this->validate([
        'paddle_details_name' =>'required',
        'paddle_details_serial_number' =>'required',
        'paddle_details_status'=>'',
    ]);

    PaddleDetails::where('paddle_details_id',$this->paddle_details_id)->update([
       'paddle_details_name'=>$validateDate['paddle_details_name'],
       'paddle_details_serial_number'=>$validateDate['paddle_details_serial_number'],
       'paddle_details_status'=>$validateDate['paddle_details_status'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');

}


//reset inputs
public function resetinputs(){
    $this->paddle_details_name='';
    $this->paddle_details_serial_number='';
     }




    public function render()
    {

        $data= paddleDetails::paginate(10);
        return view('livewire.paddle.paddle',['data'=> $data])->layout('livewire.system.template.template')->title('Paddle');
      //  return view('livewire.paddle.paddle');
    }
}
