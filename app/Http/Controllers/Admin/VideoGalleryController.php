<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(VideoGallery::latest())
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.video-gallery.index');
    }
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'youtube_video_link' => 'required|string',
            'serial' => 'nullable|numeric',
        ]);

        return response()->reportTo(
            VideoGallery::create($validated),
            'Created successfully',
            route('admin.video-gallery.index')
        );
    }

    public function edit(VideoGallery $videoGallery)
    {

    }

    public function update(Request $request, VideoGallery $videoGallery)
    {

    }
    public function destroy(VideoGallery $videoGallery)
    {
        return response()->reportTo(
            $videoGallery->delete(),
            'Deleted successfully',
            route('admin.video-gallery.index')
        );
    }
}
