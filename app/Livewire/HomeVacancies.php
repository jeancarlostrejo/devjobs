<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class HomeVacancies extends Component
{
    public function render()
    {

        $vacancies = Vacant::all();

        return view('livewire.home-vacancies', compact('vacancies'));
    }
}
