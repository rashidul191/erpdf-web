<?php

namespace App\Http\Controllers;

use App\Lib\Card;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $cards = [];
        $cards[] = Card::make('Total User', 2);
        return view('dashboard', compact('cards'));
    }
}
