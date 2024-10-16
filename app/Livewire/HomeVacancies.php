<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Attributes\On;
use Livewire\Component;

class HomeVacancies extends Component
{
    public $term;
    public $category;
    public $salary;

    #[On("search-inputs-data")]
    public function search($term, $category, $salary)
    {
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        $vacancies = Vacant::all();

        return view('livewire.home-vacancies', compact('vacancies'));
    }
}
