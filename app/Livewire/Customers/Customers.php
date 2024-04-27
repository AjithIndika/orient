<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\CustomersDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Helper\apirequest;



class Customers extends Component
{

    use WithPagination;

    #[Validate('required')]
    public $customers_name = '';

    #[Validate('required')]
    public $customers_address = '';

    #[Validate('required')]
    public $Customers_relation_officer_name = '';

    #[Validate('required')]
    public $customers_telephone = '';

    #[Validate('required')]
    public $customers_email = '';
    public $customers_id = '';
    public $customers_register_user = '';






    public function save(){
       // $this->validate();

       $validated = $this->validate([
        'customers_name' =>'required|unique:customers_details',
        'customers_address' =>'required',
        'Customers_relation_officer_name' =>'required',
        'customers_telephone' =>'required',
        'customers_email' =>'required|email',
        //'customers_register_user'=>'required'
    ]);



         CustomersDetails::create($this->modelData());
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetInputFields();

    }



    public function modelData()
    {
        return [
            'customers_name' =>$this->customers_name,
            'customers_address' =>$this->customers_address,
            'Customers_relation_officer_name' =>$this->Customers_relation_officer_name,
            'customers_telephone' =>$this->customers_telephone,
            'customers_email' =>$this->customers_email,
            'customers_register_user'=>Auth::user()->name,
        ];
    }



    public function resetInputFields(){
        $this->customers_name='';
        $this->customers_address='';
        $this->Customers_relation_officer_name='';
        $this->customers_telephone='';
        $this->customers_email='';

       }




public function cusEdit(int $customers_id){

    $cus=CustomersDetails::where('customers_id',$customers_id)->first();

  if($cus){
        $this->customers_id=$cus->customers_id;
        $this->customers_name=$cus->customers_name;
        $this->customers_address=$cus->customers_address;
        $this->customers_telephone=$cus->customers_telephone;
        $this->Customers_relation_officer_name=$cus->Customers_relation_officer_name;
        $this->customers_email=$cus->customers_email;

    }
    else{
    }
    $this->dispatch('showeditbranches');
}


public function updateCustomers(){

    $validateDate = $this->validate([
        'customers_name' =>'required',
        'customers_address' =>'required',
        'customers_telephone' =>'required',
        'Customers_relation_officer_name' =>'required',
        'customers_email' =>'required|email',
    ]);

    CustomersDetails::where('customers_id',$this->customers_id)->update([
       'customers_name'=>$validateDate['customers_name'],
       'customers_address'=>$validateDate['customers_address'],
       'customers_telephone'=>$validateDate['customers_telephone'],
       'Customers_relation_officer_name'=>$validateDate['Customers_relation_officer_name'],
       'customers_email'=>$validateDate['customers_email'],
    ]);

    toastr()->success('Data has been saved successfully!', 'Congrats');
}




    public function render()
    {
       // $customer=CustomersDetails::all();
       return view('livewire.customers.customers',[
        'customer' => CustomersDetails::paginate(10),
    ])->layout('livewire.system.template.template')->title('Customers');
    }
}
