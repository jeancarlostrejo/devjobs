<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VacantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Vacant::class);

        return view('vacants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Vacant::class);

        return view('vacants.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacant $vacant): View
    {
        $vacant->load(['category:id,name', 'salary:id,salary']);

        return view('vacants.show', compact('vacant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacant $vacant): View
    {
        $this->authorize('update', $vacant);

        return view('vacants.edit', compact('vacant'));
    }
}
