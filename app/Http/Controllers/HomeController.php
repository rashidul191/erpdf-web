<?php

namespace App\Http\Controllers;

use App\Enums\IsHomeStatus;
use App\Models\Admin\Slider;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home', IsHomeStatus::Yes)->oldest('serial')->get();
        $data['notices'] = Notice::latest()->get();
        $data['services'] = Service::oldest()->get();
        $data['galleryImages'] = Gallery::latest()->take(12)->get();
        $data['blogs'] = Blog::latest()->limit(2)->get();

        return view('front-end.home.index')->with($data);
    }
}
