<?php

namespace App\Livewire\System\Template;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


use Livewire\Component;
use App\Models\Permittion;

class Template extends Component
{
    public function render()
    {

       // $users=Permittion::where('user_id',Auth::id())->value('permittions');
      

        return view('livewire.system.template.template');
    }
}
