<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubOfSubMenuController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(Menu::whereNull('menu_id')->whereNotNull('sub_menu_id')->with(['page', 'subMenu.page'])->oldest('serial'))
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $color = match ($row->status->value) {
                        0 => 'text-red-500',
                        1 => 'text-green-500',
                        default => 'text-gray-600',
                    };

                    return "<span class='text-sm {$color}'>" . $row->status->description . "</span>";
                })
                // ✅ FIX HERE
                ->addColumn('sub_menu_name', function ($row) {
                    return $row->subMenu?->page->title ?? '-';
                })
                ->rawColumns(['status'])
                ->toJson();
        }
        return view('admin.sub-of-sub-menu.index');
    }

    public function create()
    {
        $pages = Page::where('status', CommonStatus::Active())->whereDoesntHave('menu')->oldest('title')->get();
        $subMenus = Menu::whereNotNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();

        return view('admin.sub-of-sub-menu.create', compact('subMenus', 'pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_id' => 'nullable|integer|exists:pages,id',
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        return response()->reportTo(
            Menu::create($validated),
            'Created successfully',
            route('admin.sub-of-sub-menu.index')
        );
    }

    public function edit(Menu $subOfSubMenu)
    {

        $pages = Page::where('status', CommonStatus::Active())
            ->where(function ($query) use ($subOfSubMenu) {
                $query->whereDoesntHave('menu') // unused pages
                    ->orWhere('id', $subOfSubMenu->page_id); // 🔥 include current one
            })
            ->oldest('title')
            ->get();
        $subMenus = Menu::whereNotNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();
        return view('admin.sub-of-sub-menu.edit', compact('subOfSubMenu', 'pages', 'subMenus'));
    }

    public function update(Request $request, Menu $subOfSubMenu)
    {
        // Validate input
        $validated = $request->validate([
            'page_id' => 'nullable|integer|exists:pages,id',
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        // Return response
        return response()->reportTo(
            $subOfSubMenu->update($validated),
            'Updated successfully',
            route('admin.sub-of-sub-menu.index')
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
