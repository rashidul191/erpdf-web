<?php

namespace App\Http\Controllers;

use App\Enums\IsHomeStatus;
use App\Models\AboutLeftSide;
use App\Models\AboutRightSide;
use App\Models\Admin\Slider;
use App\Models\Admin\Team;
use App\Models\Blog;
use App\Models\FAQ;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home', IsHomeStatus::Yes)->latest()->get();
        $data['aboutLeftSideContents'] = AboutLeftSide::oldest()->get();
        $data['aboutRightSideContents'] = AboutRightSide::oldest()->get();
        $data['services'] = Service::oldest()->get();
        $data['blogs'] = Blog::latest()->limit(2)->get();

        $data['teams'] = Team::orderBy('serial', 'asc')->get();

        $data['faqs'] = FAQ::latest()->limit(4)->get();    
        return view('front-end.home.index')->with($data);
    }
}
