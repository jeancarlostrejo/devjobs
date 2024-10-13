<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVacants extends Component
{
    use WithPagination;

    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.show-vacants', compact('vacants'));
    }
}
