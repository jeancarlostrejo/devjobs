<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vacant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadCvController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Vacant $vacant, Candidate $candidate)
    {
        if(!(auth()->user()->id === $vacant->user_id && $vacant->id === $candidate->vacant_id))
        {
            abort(403);
        }

        return Storage::disk('local')->download($candidate->cv);
    }
}
