<?php

namespace App\Http\Controllers;

use App\Enums\IsHomeStatus;
use App\Models\Activity;
use App\Models\Admin\Slider;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\VideoGallery;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home', IsHomeStatus::Yes)->oldest('serial')->get();
        $data['notices'] = Notice::latest()->get();
        $data['activities'] = Activity::oldest('serial')->get();
        $data['services'] = Service::oldest('serial')->get();
        $data['galleryImages'] = Gallery::oldest('serial')->take(20)->get();
        $data['videoGalleries'] = VideoGallery::oldest('serial')->get();
        $data['testimonials'] = Testimonial::latest()->take(12)->get();
        $data['blogs'] = Blog::latest()->take(5)->get();

        return view('front-end.pages.home-page')->with($data);
    }
}
