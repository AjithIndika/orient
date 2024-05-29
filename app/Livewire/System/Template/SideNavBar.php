<?php

namespace App\Livewire\System\Template;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permittion;

use Livewire\Component;

class SideNavBar extends Component
{

    public $per;
    public function render()
    {

        $user=json_decode(Permittion::where('user_id',Auth::id())->get());

      

        return view('livewire.system.template.side-nav-bar');
    }
}
