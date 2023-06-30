<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Division;

class DivisionController extends Controller
{
    public function store(StoreRequest $request)
    {
        $division = Division::query()
            ->create($request->validated());

        return response()->json([
            'data' => $division,
            'message' => 'Created'
        ]);
    }

    public function update(UpdateRequest $request, Division $division)
    {
        $division->update($request->validated());

        return response()->json([
            'data' => $division,
            'message' => 'Saved'
        ]);
    }

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
        $division = Division::find($id);
        $division->update(['available' => !$division->available]);

        return response()->json([
            'message' => 'Updated'
        ]);
    }


    public function trashed(int $id)
    {
        $isTrashed = Division::withTrashed()->find($id)->trashed();

        return response()->json([
            'data' => $isTrashed,
        ]);
    }
}
