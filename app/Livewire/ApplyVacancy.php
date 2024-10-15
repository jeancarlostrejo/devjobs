<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    #[Validate('required|mimes:pdf')]
    public $cv;

    public function apply()
    {
        $this->validate();


    }
    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
