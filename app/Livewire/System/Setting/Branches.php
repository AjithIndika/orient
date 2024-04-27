<?php

namespace App\Livewire\System\Setting;
use Livewire\Component;
Use App\Models\Branch;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;

class Branches extends Component
{
    protected $paginationTheme = 'bootstrap';
    #[Validate('required')]
    public $branches_name = '';
    #[Validate('required')]
    public $branches_address = '';
    #[Validate('required')]
    public $branches_telephone = '';
    #[Validate('required')]
    public $branches_email = '';

    public $branches_id='';
    public $branches_edit_id='';

    //public $branches_id='';


    public function save()
    {
        $validated = $this->validate([
            'branches_name' =>'required|unique:branches',
            'branches_address' =>'required',
            'branches_telephone' =>'required',
            'branches_email' =>'required|email',
        ]);



       Branch::create($validated);
       toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
}



//eset input
public function resetinputs(){
    $this->branches_id='';
    $this->branches_id='';
    $this->branches_name='';
    $this->branches_address='';
    $this->branches_telephone='';
    $this->branches_email='';
    $this->branches_edit_id='';
   }

public function branchEdit(int $branches_id){

    $branch=Branch::where('branches_id',$branches_id)->first();

  if($branch){
        $this->branches_id=$branch->branches_id;
        $this->branches_name=$branch->branches_name;
        $this->branches_address=$branch->branches_address;
        $this->branches_telephone=$branch->branches_telephone;
        $this->branches_email=$branch->branches_email;
    }
    else{
    }
    $this->dispatch('showeditbranches');
}


public function updateBranch(){

    $validateDate = $this->validate([
        'branches_name' =>'required',
        'branches_address' =>'required',
        'branches_telephone' =>'required',
        'branches_email' =>'required|email',
    ]);

    Branch::where('branches_id',$this->branches_id)->update([
       'branches_name'=>$validateDate['branches_name'],
       'branches_address'=>$validateDate['branches_address'],
       'branches_telephone'=>$validateDate['branches_telephone'],
       'branches_email'=>$validateDate['branches_email'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');
}






    public function render()
    {
        $branch=Branch::all();
        return view('livewire.system.setting.branches',['branch'=>$branch])->layout('livewire.system.template.template')->title('Dashboard');
    }
}
