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
        return view('vacants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vacants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacant $vacant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacant $vacant): View
    {
        $this->authorize('update', $vacant);

        return view('vacants.edit', compact('vacant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacant $vacant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacant $vacant)
    {
        //
    }
}
