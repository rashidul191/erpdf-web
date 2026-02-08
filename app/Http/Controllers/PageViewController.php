<?php

namespace App\Http\Controllers;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function offerPage(){
        $offers = Slider::latest()->paginate(21);
        return view('front-end.offers.index', compact('offers'));
    }
}
