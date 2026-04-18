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
            return datatables(Menu::whereNull('menu_id')->whereNull('sub_menu_id')->with('page')->oldest('serial'))
                ->addIndexColumn()
                 ->addColumn('status', function ($row) {
                    $color = match ($row->status->value) {
                        0 => 'text-red-500',
                        1 => 'text-green-500',
                        default => 'text-gray-600',
                    };

                    return "<span class='text-sm {$color}'>" . $row->status->description . "</span>";
                })
                ->rawColumns(['status'])
                ->toJson();
        }
        return view('admin.menu.index');
    }

    public function create()
    {
        $pages = Page::where('status', CommonStatus::Active())->whereDoesntHave('menu')->oldest('title')->get();
        // dd($pages);
        return view('admin.menu.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'serial' => 'nullable|integer',
            'status' => 'nullable|integer',
        ]);

        return response()->reportTo(
            Menu::create($validated),
            'Created successfully',
            route('admin.menu.index')
        );
    }


    public function edit(Menu $menu)
    {
        $pages = Page::where('status', CommonStatus::Active())
            ->where(function ($query) use ($menu) {
                $query->whereDoesntHave('menu') // unused pages
                    ->orWhere('id', $menu->page_id); // 🔥 include current one
            })
            ->oldest('title')
            ->get();

        return view('admin.menu.edit', compact('menu', 'pages'));
    }


    public function update(Request $request, Menu $menu)
    {
        // Validate input
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'serial' => 'nullable|integer',
            'status' => 'nullable|integer',
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
