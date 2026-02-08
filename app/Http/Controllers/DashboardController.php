<?php

namespace App\Http\Controllers;

use App\Lib\Card;
use App\Models\FrontEnd\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $cards = [];
        $cards[] = Card::make('Total Order', Order::where('user_id', Auth::id())->count());
        return view('dashboard', compact('cards'));
    }
}
