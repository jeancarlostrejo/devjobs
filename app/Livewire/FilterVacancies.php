<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacancies extends Component
{
    public $term;
    public $category;
    public $salary;

    public function dataForm()
    {
        $this->dispatch("search-inputs-data", $this->term, $this->category, $this->salary);
    }

    public function render()
    {
        $categories = Category::select(['id', 'name'])->get();
        $salaries = Salary::select(['id', 'salary'])->get();

        return view('livewire.filter-vacancies', compact('categories', 'salaries'));
    }
}
