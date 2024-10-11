<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class CreateVacant extends Component
{
    public function render()
    {
        $categories = Category::select(['id', 'name'])->get();
        $salaries = Salary::select(['id', 'salary'])->get();

        return view('livewire.create-vacant', compact('categories', 'salaries'));
    }
}
