<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(Testimonial::latest())
                ->addIndexColumn()
                ->addColumn('review_text', function ($row) {
                    return Str::limit(strip_tags($row->review_text ?? '--'), 50);
                })
                ->toJson();
        }
        return view('admin.testimonial.index');
    }
    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'review_text' => 'nullable|string',
        ]);

        return response()->reportTo(
            Testimonial::create($validated),
            'Created successfully',
            route('admin.testimonial.index')
        );
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        // Validate input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'review_text' => 'nullable|string',
        ]);
        // Return response
        return response()->reportTo(
            $testimonial->update($validated),
            'Updated successfully',
            route('admin.testimonial.index')
        );
    }
    public function destroy(Testimonial $testimonial)
    {
        return response()->reportTo(
            $testimonial->delete(),
            'Deleted successfully',
            route('admin.testimonial.index')
        );
    }
}
