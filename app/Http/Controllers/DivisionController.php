<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
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

    public function show(Division $division)
    {
        //
    }

    public function edit(Division $division)
    {
        return Inertia::render('Division/DivisionEdit', [
            'division' => $division
        ]);
    }
}
