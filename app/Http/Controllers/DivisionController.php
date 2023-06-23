<?php

namespace App\Http\Controllers;

use App\Http\Requests\Division\StoreRequest;
use App\Http\Requests\Division\UpdateRequest;
use App\Models\Division;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::query()->get();

        return Inertia::render('Division/DivisionIndex', [
            'divisions' => $divisions
        ]);

    }

    public function create()
    {
        return Inertia::render('Division/DivisionCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Division::query()
            ->create($request->validated());

        return to_route('division.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return Inertia::render('Division/DivisionEdit', [
            'division' => $division
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Division $division)
    {
        $division->update($request->validated());

        return to_route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return to_route('division.index');
    }
}
