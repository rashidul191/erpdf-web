<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurStory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurStoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(OurStory::latest())
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return Str::limit(strip_tags($row->description ?? '--'), 50);
                })
                ->toJson();
        }
        return view('admin.our-story.index');
    }
    public function create()
    {
        return view('admin.our-story.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'date'          => 'nullable|string|max:255',
            'title'   => 'required|string|max:255',
            'description'  => 'required|string',
        ]);

        return response()->reportTo(
            OurStory::create($validated),
            'Created successfully',
            route('admin.our-story.index')
        );
    }

    public function edit(OurStory $ourStory)
    {
        return view('admin.our-story.edit', compact('ourStory'));
    }

    public function update(Request $request, OurStory $ourStory)
    {
        // Validate input
        $validated = $request->validate([
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'date'          => 'nullable|string|max:255',
            'title'   => 'nullable|string|max:255',
            'description'  => 'nullable|string',
        ]);
        // Return response
        return response()->reportTo(
            $ourStory->update($validated),
            'Updated successfully',
            route('admin.our-story.index')
        );
    }
    public function destroy(OurStory $ourStory)
    {
        return response()->reportTo(
            $ourStory->delete(),
            'Deleted successfully',
            route('admin.our-story.index')
        );
    }
}
