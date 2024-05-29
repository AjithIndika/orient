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
                    );

        $permition=['user_id'=>$userID,'permittions'=>json_encode($permi)];
        Permittion::create($permition);
        toastr()->success('Data has been saved successfully!', 'Congrats');
        $this->resetinputs();

    }

public function Edit(int $id){

    $edata= User::join('permittions','permittions.user_id','=','users.id')->where('users.id',$id )->first();

        if($edata){
              $this->name=$edata->name;
              $this->email=$edata->email;
              $this->permittions_id=$edata->permittions_id;
              $per=json_decode($edata->permittions);

             $this->system_Setting_view=$per->system_Setting_view;
             $this->user_view=$per->user_view;
             $this->new_user_add=$per->new_user_add;
             $this->user_edit=$per->user_edit;
             $this->user_password=$per->user_password;

             $this->branches_view=$per->branches_view;
             $this->branches_add=$per->branches_add;
             $this->branches_edit=$per->branches_edit;



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
                    );



    Permittion::where('permittions_id',$this->permittions_id)->update(['permittions'=>json_encode($permi)]);
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
