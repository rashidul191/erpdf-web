<?php

namespace App\Http\Controllers\Admin;

use App\Lib\Card;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Models\Admin\Team;
use App\Models\Blog;
use App\Models\ClientSay;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:admin.verification.notice');
    }
    public function index()
    {
        $cards = [];

        // Show all cards
        $cards = [
            // Card::make('Total Users', User::count()),
            Card::make('Total Slider', Slider::count()),
            Card::make('Total News', Blog::count()),
            Card::make('Total Room', Room::count()),
            // Card::make('Total Galleries', Gallery::count()),
            Card::make('Total Members', Team::count()),
            // Card::make('Total Services', Service::count()),
            // Card::make('Total Reviews', ClientSay::count()),
        ];

        return view('admin.dashboard', compact('cards'));
    }
}
