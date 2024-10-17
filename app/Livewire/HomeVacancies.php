<?php

namespace App\Livewire;

use App\Models\Vacant;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacancies extends Component
{
    use WithPagination;

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
        $vacancies = Vacant::with(['salary', 'category'])->when($this->term, function ($query) {
            $query->where('title', "LIKE", "%" . $this->term . "%");
        })->when($this->term, function ($query) {
            $query->orWhere('company', "LIKE", "%" . $this->term . "%");
        })->when($this->category, function ($query) {
            $query->where('category_id', $this->category);
        })->when($this->salary, function ($query) {
            $query->where('salary_id', $this->salary);
        })->whereDate('last_day_apply', ">=", Carbon::today())
        ->latest('last_day_apply')
        ->paginate(10);

        return view('livewire.home-vacancies', compact('vacancies'));
    }
}
