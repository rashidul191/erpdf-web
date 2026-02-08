<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\IsHomeStatus;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;


class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('is_home',  IsHomeStatus::Yes)->orderBy('created_at', 'desc')->get();
    
        return view('front-end.home.index')->with($data);
    }
}
