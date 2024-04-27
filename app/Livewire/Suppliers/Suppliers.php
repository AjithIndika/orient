<?php

namespace App\Livewire\Suppliers;
use App\Models\SuppliersDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Helper\apirequest;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;



use Livewire\Component;

class Suppliers extends Component
{
    protected $paginationTheme = 'bootstrap';


    #[Validate('required')]
    public $suppliers_name = '';


    #[Validate('required')]
    public $suppliers_address = '';

    #[Validate('required')]
    public $suppliers_relation_officer_name = '';


    #[Validate('required')]
    public $suppliers_telephone = '';


    #[Validate('required')]
    public $suppliers_email = '';

    public $suppliers_register_user = '';

    public $suppliers_id='';



    public function save()
    {
        $validated = $this->validate([
            'suppliers_name' =>'required',
            'suppliers_address' =>'required',
            'suppliers_relation_officer_name' =>'required',
            'suppliers_telephone' =>'required',
            'suppliers_email' =>'required|email',
            'suppliers_register_user'=>''
        ]);



        SuppliersDetails::create($validated);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();
}




public function resetinputs(){
    $this->suppliers_name='';
    $this->suppliers_address='';
    $this->suppliers_relation_officer_name='';
    $this->suppliers_telephone='';
    $this->suppliers_email='';

   }





public function supEdit(int $suppliers_id){

    $SupDe=SuppliersDetails::where('suppliers_id',$suppliers_id)->first();

  if($SupDe){
        $this->suppliers_id=$SupDe->suppliers_id;
        $this->suppliers_name=$SupDe->suppliers_name;
        $this->suppliers_address=$SupDe->suppliers_address;
        $this->suppliers_relation_officer_name=$SupDe->suppliers_relation_officer_name;
        $this->suppliers_telephone=$SupDe->suppliers_telephone;
        $this->suppliers_email=$SupDe->suppliers_email;
    }
    else{
    }
    $this->dispatch('showeditbranches');
}


public function updateSupliers(){

    $validateDate = $this->validate([
            'suppliers_name' =>'required',
            'suppliers_address' =>'required',
            'suppliers_relation_officer_name' =>'required',
            'suppliers_telephone' =>'required',
            'suppliers_email' =>'required|email',
            'suppliers_register_user'=>''
    ]);

    SuppliersDetails::where('suppliers_id',$this->suppliers_id)->update([
       'suppliers_name'=>$validateDate['suppliers_name'],
       'suppliers_address'=>$validateDate['suppliers_address'],
       'suppliers_relation_officer_name'=>$validateDate['suppliers_relation_officer_name'],
       'suppliers_telephone'=>$validateDate['suppliers_telephone'],
       'suppliers_email'=>$validateDate['suppliers_email'],
       'suppliers_register_user'=>$validateDate['suppliers_register_user'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');
}



    public function render()
    {
      //  return view('');

        return view('livewire.suppliers.suppliers',[
            'suppliers' => SuppliersDetails::paginate(10),
        ])->layout('livewire.system.template.template')->title('Suppliers');
    }
}
