<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\IsHomeStatus;
use App\Http\Controllers\Controller;
use App\Models\AboutRightSide;
use App\Models\Admin\Slider;
use App\Models\Admin\Team;
use App\Models\ClientSay;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home',  IsHomeStatus::Yes)->latest()->get();
        $data['aboutRightSideImages'] = AboutRightSide::latest()->get();
        $data['services'] = Service::oldest()->get();
        $data['teams'] = Team::orderBy('serial', 'asc')->get();
        $data['clientSays'] = ClientSay::latest()->get();

        return view('front-end.home.index')->with($data);
    }
}
