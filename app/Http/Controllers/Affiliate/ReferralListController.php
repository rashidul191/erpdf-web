<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralListController extends Controller
{
    public function __invoke(Request $request)
    {
        dd('ReferralListController');
        // if ($request->ajax()) {
        //     return datatables(
        //         Auth::user()->referrals()->(['id','referrer_id','username','created_at','status'])
        //     )->addIndexColumn()->toJson();
        // }

        return view('affiliate.list.index');
    }
}
