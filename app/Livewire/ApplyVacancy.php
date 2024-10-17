<?php

namespace App\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    #[Validate('required|mimes:pdf')]
    public $cv;

    public $vacant;

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
    }

    public function apply()
    {
        $this->authorize('apply', Vacant::class);

        $validated = $this->validate();
        $validated['cv'] = Storage::disk('local')->put('cv', $this->cv);

        $this->vacant->candidates()->create([
            'cv' => $validated["cv"],
            'user_id' => auth()->user()->id
        ]);

        $this->vacant->recruiter->notify(new NewCandidate($this->vacant, auth()->user()));

        $this->reset();

        return redirect()->back()->with('message', __('Your information was sent correctly, good luck!'));
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
