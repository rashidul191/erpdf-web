<?php

namespace App\Http\Controllers\Admin;

use App\Lib\Card;
use App\Http\Controllers\Controller;
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
            Card::make('Total User', User::count()),            
        ];

        return view('admin.dashboard', compact('cards'));
    }
}
