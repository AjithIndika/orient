<?php

namespace App\Livewire\Users;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permittion;


use Livewire\Component;

class NewUser extends Component
{

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/



    public $name;
    public $email;
    public $password;

    public $password_confirmation;

    public $system_Setting;
    public $system_Setting_view;
    public $id;
    public $user_view;
    public $new_user_add;
    public $user_edit;
    public $user_password;
    public $permittions_id;


    public $branches_view;
    public $branches_add;
    public $branches_edit;


    public $Customer_view ;
    public $Customer_add;
    public $Customer_edit;


    public $supplier_view;
    public $supplier_add;
    public $supplier_edit;


    public $machine_view ;
    public $machine_add;
    public $machine_edit;



    public $machineModel_view;
    public $machineModel_add;
    public $machineModel_edit;


    public $machineBrand_view;
    public $machineBrand_add;
    public $machineBrand_edit;


    public $machineType_view;
    public $machineType_add;
    public $machineType_edit;


    public $Iron_view;
    public $Iron_add;
    public $Iron_edit;


    public $paddle_view;
    public $paddle_add;
    public $paddle_edit;


    public $box_view;
    public $box_add;
    public $box_edit;


    public $delivery_note_view;
    public $delivery_note_add;
    public $delivery_note_edit;

    public $ret_delivery_note_view;
    public $ret_delivery_note_add;
    public $ret_delivery_note_edit;


    public $otherparts_view;
    public $otherparts_add;
    public $otherparts_edit;

    public $new_invoice_view;
    public $new_invoice_Check;
    public $new_invoice_approval;

    public $rady_invoice_view;
    public $rady_send_email_invoice;
    public $rady_send_email_view;


    public $pending_invoice_menu_view;
    public $pending_invoice_payment_update;
    public $pending_invoice_view;
    public $complete_invoice_menu_view;
    public $complete_invoice_payment_view;
    public $complete_invoice_view;






    public function save(){


        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);


        $data=['name' => $this->name, 'email' => $this->email, 'password' => Hash::make($this->password)];
        $userID = User::create($data)->id;
        $permi= array('system_Setting_view'=>$this->system_Setting_view,
                      'user_view'=>$this->user_view,
                      'new_user_add'=>$this->new_user_add,
                      'user_edit'=>$this->user_edit,
                      'user_password'=>$this->user_password,
                      'branches_view'=>$this->branches_view ,
                      'branches_add'=>$this->branches_add,
                      'branches_edit'=>$this->branches_edit,
                      'Customer_view'=>$this->Customer_view ,
                      'Customer_add'=>$this->Customer_add,
                      'Customer_edit'=>$this->Customer_edit,

                      'supplier_view'=>$this->supplier_view ,
                      'supplier_add'=>$this->supplier_add,
                      'supplier_edit'=>$this->supplier_edit,

                      'machine_view'=>$this->machine_view,
                      'machine_add'=>$this->machine_add,
                      'machine_edit'=>$this->machine_edit,

                      'machineModel_view'=>$this->machineModel_view,
                      'machineModel_add'=>$this->machineModel_add,
                      'machineModel_edit'=>$this->machineModel_edit,

                      'machineBrand_view'=>$this->machineBrand_view,
                      'machineBrand_add'=>$this->machineBrand_add,
                      'machineBrand_edit'=>$this->machineBrand_edit,


                      'machineType_view'=>$this->machineType_view,
                      'machineType_add'=>$this->machineType_add,
                      'machineType_edit'=>$this->machineType_edit,

                      'Iron_view'=>$this->Iron_view,
                      'Iron_add'=>$this->Iron_add,
                      'Iron_edit'=>$this->Iron_edit,


                      'paddle_view'=>$this->paddle_view,
                      'paddle_add'=>$this->paddle_add,
                      'paddle_edit'=>$this->paddle_edit,

                      'box_view'=>$this->box_view,
                      'box_add'=>$this->box_add,
                      'box_edit'=>$this->box_edit,


                      'delivery_note_view'=>$this->delivery_note_view,
                      'delivery_note_add'=>$this->delivery_note_add,
                      'delivery_note_edit'=>$this->delivery_note_edit,


                      'ret_delivery_note_view'=>$this->ret_delivery_note_view,
                      'ret_delivery_note_add'=>$this->ret_delivery_note_add,
                      'ret_delivery_note_edit'=>$this->ret_delivery_note_edit,

                      'otherparts_view'=>$this->otherparts_view,
                      'otherparts_add'=>$this->otherparts_add,
                      'otherparts_edit'=>$this->otherparts_edit,

                      'new_invoice_view'=>$this->new_invoice_view,
                      'new_invoice_Check'=>$this->new_invoice_Check,
                      'new_invoice_approval'=>$this->new_invoice_approval,

                      'rady_invoice_view'=>$this->rady_invoice_view,
                      'rady_send_email_invoice'=>$this->rady_send_email_invoice,
                      'rady_send_email_view'=>$this->rady_send_email_view,

                      'pending_invoice_menu_view'=>$this->pending_invoice_menu_view,
                      'pending_invoice_payment_update'=>$this->pending_invoice_payment_update,
                      'pending_invoice_view'=>$this->pending_invoice_view,

                      'complete_invoice_menu_view'=>$this->complete_invoice_menu_view,
                      'complete_invoice_payment_view'=>$this->complete_invoice_payment_view,
                      'complete_invoice_view'=>$this->complete_invoice_view,

                    );

        $permition=['user_id'=>$userID,'permittions'=>json_encode($permi)];
        Permittion::create($permition);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

     $this->dispatch('close-modal');
    // $this->dispatch('close-modal');

    }

public function Edit(int $id){

    $edata= User::join('permittions','permittions.user_id','=','users.id')->where('users.id',$id )->first();

        if($edata){
              $this->name=$edata->name;
              $this->email=$edata->email;
              $this->permittions_id=$edata->permittions_id;
              $per=json_decode($edata->permittions);

            // seeting
             $this->system_Setting_view=$per->system_Setting_view;
             //user
             $this->user_view=$per->user_view;
             $this->new_user_add=$per->new_user_add;
             $this->user_edit=$per->user_edit;
             $this->user_password=$per->user_password;
             //branch
             $this->branches_view=$per->branches_view;
             $this->branches_add=$per->branches_add;
             $this->branches_edit=$per->branches_edit;
             //custemers

             $this->Customer_view=$per->Customer_view;
             $this->Customer_add=$per->Customer_add;
             $this->Customer_edit=$per->Customer_edit;

             $this->supplier_view=$per->supplier_view;
             $this->supplier_add=$per->supplier_add;
             $this->supplier_edit=$per->supplier_edit;


             $this->machine_view=$per->machine_view;
             $this->machine_add=$per->machine_add;
             $this->machine_edit=$per->machine_edit;

             $this->machineModel_view=$per->machineModel_view;
             $this->machineModel_add=$per->machineModel_add;
             $this->machineModel_edit=$per->machineModel_edit;



             $this->machineModel_view=$per->machineModel_view;
             $this->machineModel_add=$per->machineModel_add;
             $this->machineModel_edit=$per->machineModel_edit;


             $this->machineBrand_view=$per->machineBrand_view;
             $this->machineBrand_add=$per->machineModel_add;
             $this->machineBrand_edit=$per->machineBrand_edit;


             $this->machineType_view=$per->machineType_view;
             $this->machineType_add=$per->machineType_add;
             $this->machineType_edit=$per->machineType_edit;

             $this->Iron_view=$per->Iron_view;
             $this->Iron_add=$per->Iron_add;
             $this->Iron_edit=$per->Iron_edit;

             $this->paddle_view=$per->paddle_view;
             $this->paddle_add=$per->paddle_add;
             $this->paddle_edit=$per->paddle_edit;


             $this->box_view=$per->box_view;
             $this->box_add=$per->box_add;
             $this->box_edit=$per->box_edit;

             $this->delivery_note_view=$per->delivery_note_view;
             $this->delivery_note_add=$per->delivery_note_add;
             $this->delivery_note_edit=$per->delivery_note_edit;

             $this->ret_delivery_note_view=$per->ret_delivery_note_view;
             $this->ret_delivery_note_add=$per->ret_delivery_note_add;
             $this->ret_delivery_note_edit=$per->ret_delivery_note_edit;


             $this->otherparts=$per->otherparts_view;
             $this->otherparts_add=$per->otherparts_add;
             $this->otherparts_edit=$per->otherparts_edit;


             $this->new_invoice_view=$per->new_invoice_view;
             $this->new_invoice_Check=$per->new_invoice_Check;
             $this->new_invoice_approval=$per->new_invoice_approval;


             $this->rady_invoice_view=$per->rady_invoice_view;
             $this->rady_send_email_invoice=$per->rady_send_email_invoice;
             $this->rady_send_email_view=$per->rady_send_email_view;


             $this->pending_invoice_menu_view=$per->pending_invoice_menu_view;
             $this->pending_invoice_payment_update=$per->pending_invoice_payment_update;
             $this->pending_invoice_view=$per->pending_invoice_view;



             $this->complete_invoice_menu_view=$per->complete_invoice_menu_view;
             $this->complete_invoice_payment_view=$per->complete_invoice_payment_view;
             $this->complete_invoice_view=$per->complete_invoice_view;

          }
          else{
          }
          $this->dispatch('password');


}


public function update(){

    $permi= array('system_Setting_view'=>$this->system_Setting_view,
                      'user_view'=>$this->user_view,
                      'new_user_add'=>$this->new_user_add,
                      'user_edit'=>$this->user_edit,
                      'user_password'=>$this->user_password,
                      'branches_view'=>$this->branches_view ,
                      'branches_add'=>$this->branches_add,
                      'branches_edit'=>$this->branches_edit,
                      'Customer_view'=>$this->Customer_view ,
                      'Customer_add'=>$this->Customer_add,
                      'Customer_edit'=>$this->Customer_edit,

                      'supplier_view'=>$this->supplier_view ,
                      'supplier_add'=>$this->supplier_add,
                      'supplier_edit'=>$this->supplier_edit,

                      'machine_view'=>$this->machine_view ,
                      'machine_add'=>$this->machine_add,
                      'machine_edit'=>$this->machine_edit,

                      'machineModel_view'=>$this->machineModel_view,
                      'machineModel_add'=>$this->machineModel_add,
                      'machineModel_edit'=>$this->machineModel_edit,

                      'machineBrand_view'=>$this->machineBrand_view,
                      'machineBrand_add'=>$this->machineBrand_add,
                      'machineBrand_edit'=>$this->machineBrand_edit,


                      'machineType_view'=>$this->machineType_view,
                      'machineType_add'=>$this->machineType_add,
                      'machineType_edit'=>$this->machineType_edit,

                      'Iron_view'=>$this->Iron_view,
                      'Iron_add'=>$this->Iron_add,
                      'Iron_edit'=>$this->Iron_edit,

                      'paddle_view'=>$this->paddle_view,
                      'paddle_add'=>$this->paddle_add,
                      'paddle_edit'=>$this->paddle_edit,

                      'box_view'=>$this->box_view,
                      'box_add'=>$this->box_add,
                      'box_edit'=>$this->box_edit,


                      'delivery_note_view'=>$this->delivery_note_view,
                      'delivery_note_add'=>$this->delivery_note_add,
                      'delivery_note_edit'=>$this->delivery_note_edit,

                      'ret_delivery_note_view'=>$this->ret_delivery_note_view,
                      'ret_delivery_note_add'=>$this->ret_delivery_note_add,
                      'ret_delivery_note_edit'=>$this->ret_delivery_note_edit,



                      'otherparts_view'=>$this->otherparts_view,
                      'otherparts_add'=>$this->otherparts_add,
                      'otherparts_edit'=>$this->otherparts_edit,

                      'new_invoice_view'=>$this->new_invoice_view,
                      'new_invoice_Check'=>$this->new_invoice_Check,
                      'new_invoice_approval'=>$this->new_invoice_approval,

                      'rady_invoice_view'=>$this->rady_invoice_view,
                      'rady_send_email_invoice'=>$this->rady_send_email_invoice,
                      'rady_send_email_view'=>$this->rady_send_email_view,


                      'pending_invoice_menu_view'=>$this->pending_invoice_menu_view,
                      'pending_invoice_payment_update'=>$this->pending_invoice_payment_update,
                      'pending_invoice_view'=>$this->pending_invoice_view,


                      'complete_invoice_menu_view'=>$this->complete_invoice_menu_view,
                      'complete_invoice_payment_view'=>$this->complete_invoice_payment_view,
                      'complete_invoice_view'=>$this->complete_invoice_view,
                    );



    Permittion::where('permittions_id',$this->permittions_id)->update(['permittions'=>json_encode($permi)]);
    toastr()->success('Data has been saved successfully!', 'Congrats');
}



     public function passwordReset(int $id){

        $edata= User::where('id',$id )->first();

        if($edata){
              $this->name=$edata->name;
              $this->email=$edata->email;
              $this->id=$id;
          }
          else{
          }


          $this->dispatch('passwordOpop');


     }


     public function updatePassword(){
        $validated = $this->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        User::where('email',$this->email)->update(['password'=> Hash::make($this->password)]);
        toastr()->success('Data has been saved successfully!', 'Congrats');



     }


     public function resetinputs(){
        $this->name='';
        $this->email='';
        $this->password='';
        $this->password_confirmation='';
        $this->system_Setting='';
        $this->system_Setting_view='';
         }

    public function render( )
    {
       $login=User::join('permittions','permittions.user_id','=','users.id')->get();
        return view('livewire.users.new-user',['usersAll'=>$login])->layout('livewire.system.template.template')->title('View Invoice');
    }
}
