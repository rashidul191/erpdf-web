<?php

namespace App\Http\Controllers;

use App\Enums\IsHomeStatus;
use App\Models\Admin\Slider;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home', IsHomeStatus::Yes)->oldest('serial')->get();
        $data['notices'] = Notice::latest()->get();
        $data['services'] = Service::oldest('serial')->get();
        $data['galleryImages'] = Gallery::latest()->take(12)->get();
        $data['testimonials'] = Testimonial::latest()->take(12)->get();
        $data['blogs'] = Blog::latest()->take(5)->get();

        return view('front-end.pages.home-page')->with($data);
    }
}
