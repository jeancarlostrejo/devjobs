<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacant extends Component
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
    
    public $image;

    public $vacant;

    #[Validate('nullable|image|max:1024')]
    public $newImage;

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
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

        if($this->newImage){
            Storage::delete($this->image);
            $validated['image'] = Storage::put('vacants', $this->newImage);
        }

        $this->vacant->title = $validated["title"];
        $this->vacant->category_id = $validated["category"];
        $this->vacant->salary_id = $validated["salary"];
        $this->vacant->company = $validated["company"];
        $this->vacant->last_day_apply = $validated["last_day_apply"];
        $this->vacant->description = $validated["description"];
        $this->vacant->image = $validated['image'] ?? $this->image;

        $this->vacant->save();
        $this->reset();

        return to_route('vacants.index')->with('message', __("The vacancy has been successfully updated"));
    }

    public function render()
    {
        $categories = Category::select(['id', 'name'])->get();
        $salaries = Salary::select(['id', 'salary'])->get();

        return view('livewire.edit-vacant', compact('categories', 'salaries'));
    }
}
