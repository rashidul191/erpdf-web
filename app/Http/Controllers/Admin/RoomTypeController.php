<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(RoomType::oldest('name'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.room-type.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name',
        ]);

        return response()->reportTo(
            RoomType::create($validated),
            'Created successfully',
            route('admin.room-types.index')
        );
    }

    public function edit(RoomType $roomType)
    {
        return view('admin.room-type.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        // Return response
        return response()->reportTo(
            $roomType->update($validated),
            'Updated successfully',
            route('admin.room-types.index')
        );
    }
    public function destroy(RoomType $roomType)
    {
        return response()->reportTo(
            $roomType->delete(),
            'Deleted successfully',
            route('admin.room-types.index')
        );
    }
}
