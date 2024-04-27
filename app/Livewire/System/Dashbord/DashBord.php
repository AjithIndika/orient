<?php

namespace App\Livewire\System\Dashbord;

use Livewire\Component;

class DashBord extends Component
{
    public function render()
    {
        //return view('livewire.system.dashbord.dash-bord');
        return view('livewire.system.dashbord.dash-bord')->layout('livewire.system.template.template')->title('Dashboard');
    }
}
