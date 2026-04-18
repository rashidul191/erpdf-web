<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubMenuController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(Menu::whereNotNull('menu_id')->whereNull('sub_menu_id')->with(['page', 'menu.page'])->oldest('serial'))
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
        return view('admin.sub-menu.index');
    }

    public function create()
    {
        $pages = Page::where('status', CommonStatus::Active())->whereDoesntHave('menu')->oldest('title')->get();
        // dd($pages);
        $menus = Menu::whereNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();
        return view('admin.sub-menu.create', compact('menus', 'pages'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        // dd($validated['slug']);

        return response()->reportTo(
            Menu::create($validated),
            'Created successfully',
            route('admin.sub-menu.index')
        );
    }

    public function edit(Menu $subMenu)
    {

        $pages = Page::where('status', CommonStatus::Active())
            ->where(function ($query) use ($subMenu) {
                $query->whereDoesntHave('menu') // unused pages
                    ->orWhere('id', $subMenu->page_id); // 🔥 include current one
            })
            ->oldest('title')
            ->get();
        $menus = Menu::whereNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();


        return view('admin.sub-menu.edit', compact('subMenu', 'pages', 'menus'));
    }

    public function update(Request $request, Menu $subMenu)
    {
        // Validate input
        $validated = $request->validate([
            'page_id' => 'required|integer|exists:pages,id',
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);



        // Return response
        return response()->reportTo(
            $subMenu->update($validated),
            'Updated successfully',
            route('admin.sub-menu.index')
        );
    }


    // public function destroy(BlogCategory $blogCategory)
    // {
    //     return response()->reportTo(
    //         $blogCategory->delete(),
    //         'Deleted successfully',
    //         route('admin.blog-categories.index')
    //     );
    // }
}
