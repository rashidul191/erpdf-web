<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Enums\IsHomeStatus;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Slider::latest())->addIndexColumn()->toJson();
        }
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'page_link' => 'nullable|string',
            'is_home' => 'nullable|boolean',
        ]);

        return response()->reportTo(
            Slider::create($validated),
            'Created successfully',
            route('admin.slider.index')
        );
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        // Validate input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'page_link' => 'nullable|string',
            'is_home' => 'nullable|boolean',
        ]);

        if (empty($validated['is_home'])) {
            $validated['is_home'] = IsHomeStatus::Yes;
        }

        // Return response
        return response()->reportTo(
            $slider->update($validated),
            'Updated successfully',
            route('admin.slider.index')
        );
    }      public function destroy(Slider $slider)
    {
        return response()->reportTo(
            $slider->delete(),
            'Deleted successfully',
            route('admin.slider.index')
        );
    }
}
