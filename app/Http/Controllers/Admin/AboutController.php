<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutRightSide;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['aboutRightSideImages'] = AboutRightSide::latest()->get();

        // dd($data['aboutRightSideImages']);
        return view('admin.about.index', $data);
    }

    /*  About Section Left Side Methods */


    /*  About Section Right Side Methods */
    public function aboutRightSide(Request $request)
    {
        $validated =  $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024', // Max size 1MB
        ]);

        return response()->reportTo(
            AboutRightSide::create($validated),
            'Created successfully',
            route('admin.about.index')
        );
    }

    public function aboutRightSideDelete($id)
    {
        $aboutRightSideImg = AboutRightSide::findOrFail($id);
        return response()->reportTo(
            $aboutRightSideImg->delete(),
            'Deleted successfully',
            route('admin.about.index')
        );
    }
}
