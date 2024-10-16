<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateController extends Controller
{
    public function index(Vacant $vacant): View
    {
        $vacant->load('candidates.user');

        return view('candidates.index', compact('vacant'));
    }
}
