<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Career;
use Illuminate\Http\Request;


class CareerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Career::latest())
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.career.index');
    }

    public function show(Career $career)
    {
        return view('admin.career.show', compact('career'));
    }

    public function destroy(Career $career)
    {
        return response()->reportTo(
            $career->delete(),
            'Deleted successfully',
            route('admin.career.index')
        );
    }
}
