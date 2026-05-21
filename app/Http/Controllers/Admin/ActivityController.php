<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\OurStory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Activity::latest())
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.activity.index');
    }
    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'count' => 'required|numeric',
            'serial' => 'nullable|numeric',
        ]);

        return response()->reportTo(
            Activity::create($validated),
            'Created successfully',
            route('admin.activity.index')
        );
    }

    public function edit(Activity $activity)
    {
        return view('admin.activity.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        // Validate input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'count' => 'required|numeric',
            'serial' => 'nullable|numeric',
        ]);
        // Return response
        return response()->reportTo(
            $activity->update($validated),
            'Updated successfully',
            route('admin.activity.index')
        );
    }
    public function destroy(Activity $activity)
    {
        return response()->reportTo(
            $activity->delete(),
            'Deleted successfully',
            route('admin.activity.index')
        );
    }
}
