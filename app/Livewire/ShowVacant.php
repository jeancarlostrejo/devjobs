<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacant extends Component
{
    public Vacant $vacant;
    
    public function render()
    {
        return view('livewire.show-vacant');
    }
}
