<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutLeftSide;
use App\Models\AboutRightSide;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['aboutLeftSideContents'] = AboutLeftSide::oldest()->get();
        $data['aboutRightSideContents'] = AboutRightSide::oldest()->get();
        return view('admin.about.index', $data);
    }

    /*  About Section Left Side Methods */
    public function aboutLeftSideStore(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // Max size 1MB
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
        ]);

        return response()->reportTo(
            AboutLeftSide::create($validated),
            'Created successfully',
            route('admin.about.index')
        );
    }

    public function aboutLeftSideEdit($id)
    {
        $aboutLeftContent = AboutLeftSide::findOrFail($id);
        return view('admin.about.about-edit', compact('aboutLeftContent'));
    }

    public function aboutLeftSideUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // Max size 1MB
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
        ]);

        $aboutLeftContent = AboutLeftSide::findOrFail($id);

        return response()->reportTo(
            $aboutLeftContent->update($validated),
            'Updated successfully',
            route('admin.about.index')
        );
    }

    public function aboutLeftSideDelete($id)
    {
        $aboutLeftSideContent = AboutLeftSide::findOrFail($id);
        return response()->reportTo(
            $aboutLeftSideContent->delete(),
            'Deleted successfully',
            route('admin.about.index')
        );
    }


    /*  About Section Right Side Methods */
    public function aboutRightSide(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // Max size 1MB
        ]);

        return response()->reportTo(
            AboutRightSide::create($validated),
            'Created successfully',
            route('admin.about.index')
        );
    }

    public function aboutRightSideDelete($id)
    {
        $aboutRightSideContent = AboutRightSide::findOrFail($id);
        return response()->reportTo(
            $aboutRightSideContent->delete(),
            'Deleted successfully',
            route('admin.about.index')
        );
    }
}
