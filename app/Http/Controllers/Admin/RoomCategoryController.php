<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(RoomCategory::oldest('name'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.room-category.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        return response()->reportTo(
            RoomCategory::create($validated),
            'Created successfully',
            route('admin.room-categories.index')
        );
    }

    public function edit(RoomCategory $roomCategory)
    {
        return view('admin.room-category.edit', compact('roomCategory'));
    }

    public function update(Request $request, RoomCategory $roomCategory)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Return response
        return response()->reportTo(
            $roomCategory->update($validated),
            'Updated successfully',
            route('admin.room-categories.index')
        );
    }
    public function destroy(RoomCategory $roomCategory)
    {
        return response()->reportTo(
            $roomCategory->delete(),
            'Deleted successfully',
            route('admin.room-categories.index')
        );
    }
}
