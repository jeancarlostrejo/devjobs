<?php

namespace App\Livewire;

use App\Models\Vacant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVacants extends Component
{
    use WithPagination;

    #[On('delete-vacant')]
    public function prueba(Vacant $vacant)
    {
        Storage::delete($vacant->image);

        $vacant->delete();
    }
    
    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.show-vacants', compact('vacants'));
    }
}
