<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\NewCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralTreeController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd($request->get('username'));
        $center = $request->has('username')
            ?  NewCenter::where('id', '=', $request->get('username'))
            ->with(['addPSM', 'user', 'referrer', 'placement', 'addPVs.package'])->first()
            : NewCenter::where('created_by_id',  '=', Auth::id())
            ->with(['addPSM', 'user', 'referrer:id,center_id', 'placement:id,center_id'])->first();
        if (empty($center) || !$this->isBelowMyCenter($center)) {
            return view('affiliate.tree.error',);
        }

        return view('affiliate.tree.index', [
            // 'user' => $center,
            'center' => $center,
        ]);
    }

    private function isBelowMyCenter($center)
    {
        $result = false;

        $cursor = $center;

        while ($cursor) {
            if ($cursor->created_by_id == Auth::id() || $cursor->username == Auth::id()) {
                $result = true;
            }
            $cursor = $cursor->placement;
        }

        return $result;
    }
}
