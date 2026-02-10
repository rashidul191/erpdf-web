<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Gallery::latest())
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.gallery.index');
    }
    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'nullable|string|max:255',
        ]);

        return response()->reportTo(
            Gallery::create($validated),
            'Created successfully',
            route('admin.gallery.index')
        );
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {

        // Validate input
        $validated = $request->validate([
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'nullable|string|max:255',
        ]);
        // Return response
        return response()->reportTo(
            $gallery->update($validated),
            'Updated successfully',
            route('admin.gallery.index')
        );
    }
    public function destroy(Gallery $gallery)
    {
        return response()->reportTo(
            $gallery->delete(),
            'Deleted successfully',
            route('admin.gallery.index')
        );
    }
}
