<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditVacant extends Component
{
    #[Validate('required|min:3|max:255')]
    public string $title;
    
    #[Validate('required|integer|exists:categories,id')]
    public int $category;
    
    #[Validate('required|exists:salaries,id')]
    public int $salary;
    
    #[Validate('required|string|max:150')]
    public string $company;
    
    #[Validate('required|date')]
    public $last_day_apply;

    #[Validate('required')]
    public $description;
    
    public $image;

    public function mount(Vacant $vacant)
    {
        $this->title = $vacant->title;
        $this->category = $vacant->category_id;
        $this->salary = $vacant->salary_id;
        $this->company = $vacant->company;
        $this->last_day_apply = Carbon::parse($vacant->last_day_apply)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function updateVacant()
    {
        $validated = $this->validate();
    }

    public function render()
    {
        $categories = Category::select(['id', 'name'])->get();
        $salaries = Salary::select(['id', 'salary'])->get();

        return view('livewire.edit-vacant', compact('categories', 'salaries'));
    }
}
