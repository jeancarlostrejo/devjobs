<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    use WithFileUploads;

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

    #[Validate('required|image|max:1024')]
    public $image;

    public function store()
    {
        $validated = $this->validate();

        $validated['image'] = Storage::put('vacants', $this->image);

        Vacant::create([
            'title' => $validated['title'],
            'category_id' => $validated['category'],
            'salary_id' => $validated['salary'],
            'company' => $validated['company'],
            'last_day_apply' => $validated["last_day_apply"],
            'description' => $validated["description"],
            'image' => $validated['image'],
            'user_id' => auth()->user()->id
        ]);

        return to_route('vacants.index')->with('message', __("The vacancy was successfully published"));
    }

    public function render()
    {
        $categories = Category::select(['id', 'name'])->get();
        $salaries = Salary::select(['id', 'salary'])->get();

        return view('livewire.create-vacant', compact('categories', 'salaries'));
    }
}
