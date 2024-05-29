<?php

namespace App\Livewire\Access;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Helper\apirequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permittion;
use Livewire\Component;

class Access extends Component
{



    public function render()
    {

        return view('livewire.access.access')->layout('livewire.system.template.template')->title('No Access Available');
    }
}
