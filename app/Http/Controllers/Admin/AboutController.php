<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function homeAboutSection()
    {
        return view('admin.about.home-about-section');
    }
    public function index()
    {
        return view('admin.about.index');
    }

}
