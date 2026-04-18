<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Menu::whereNull('sub_menu_id')->whereNull('sub_of_sub_menu_id')->with('page')->oldest('serial'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.menu.index');
    }

    public function create()
    {
        $pages = Page::where('status', CommonStatus::Active())->oldest('title')->get();
        // dd($pages);
        return view('admin.menu.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'serial' => 'nullable|integer',
        ]);

        return response()->reportTo(
            Menu::create($validated),
            'Created successfully',
            route('admin.menu.index')
        );
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        // Validate input
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'serial' => 'nullable|integer',
        ]);

        // Return response
        return response()->reportTo(
            $menu->update($validated),
            'Updated successfully',
            route('admin.menu.index')
        );
    }


    // public function destroy(Menu $blogCategory)
    // {
    //     return response()->reportTo(
    //         $blogCategory->delete(),
    //         'Deleted successfully',
    //         route('admin.blog-categories.index')
    //     );
    // }
}
