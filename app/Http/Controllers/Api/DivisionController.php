<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Division\StoreRequest;
use App\Http\Requests\Division\UpdateRequest;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $division = Division::query()
            ->create($request->validated());

        return response()->json([
            'data' => $division,
            'message' => 'Created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Division $division)
    {
        $division->update($request->validated());

        return response()->json([
            'data' => $division,
            'message' => 'Saved'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }

    public function restore(int $id)
    {
        Division::withTrashed()->find($id)->restore();

        return response()->json([
            'message' => 'Restored'
        ]);
    }

    public function available(int $id)
    {
        Division::find($id)->update(['available' => !Division::find($id)->available]);

        return response()->json([
            'message' => 'Updated'
        ]);
    }

    public function trashed(int $id)
    {
        return response()->json([
            'data' => Division::withTrashed()->find($id)->trashed(),
        ]);
    }
}
