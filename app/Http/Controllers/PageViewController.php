<?php

namespace App\Http\Controllers;

use App\Models\AboutLeftSide;
use App\Models\AboutRightSide;
use App\Models\Admin\Slider;
use App\Models\Admin\Team;
use App\Models\OurStory;
use App\Models\Service;
use Illuminate\Http\Request;

class PageViewController extends Controller
{

    public function aboutPage()
    {
        $data['aboutLeftSideContents'] = AboutLeftSide::oldest()->get();
        $data['aboutRightSideContents'] = AboutRightSide::oldest()->get();
        $data['ourStories'] = OurStory::oldest()->get();
        $data['services'] = Service::oldest()->get();
        $data['teams'] = Team::orderBy('serial', 'asc')->get();
        return view('front-end.pages.about', $data);
    }
    public function contactPage()
    {
        return view('front-end.pages.contact');
    }
}
