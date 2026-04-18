<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubMenuController extends Controller
{
    public function index(Request $request)
    {
        // dd(Menu::whereNotNull('menu_id')
        //     ->whereNull('sub_menu_id')
        //     ->with(['menu:id,name'])
        //     ->oldest('name')
        //     ->oldest('serial')
        //     ->get());
        if ($request->ajax()) {
            return datatables(Menu::whereNotNull('menu_id')
                ->whereNull('sub_menu_id')
                ->with(['menu:id,name'])
                ->oldest('name')
                ->oldest('serial'))
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
        $menus = Menu::whereNull('menu_id')->whereNull('sub_menu_id')->get();
        return view('admin.sub-menu.create', compact('menus'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',

            'name' => 'required|string',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        $validated['slug'] = generateSlug(Menu::class, $validated['name']);

        // dd($validated['slug']);

        return response()->reportTo(
            Menu::create($validated),
            'Created successfully',
            route('admin.sub-menu.index')
        );
    }

    public function edit(Menu $subMenu)
    {

        $menus = Menu::whereNull('menu_id')->whereNull('sub_menu_id')->get();

        return view('admin.sub-menu.edit', compact('subMenu', 'menus'));
    }

    public function update(Request $request, Menu $subMenu)
    {
        // Validate input
        $validated = $request->validate([
            'menu_id' => 'nullable|integer|exists:menus,id',
            'sub_menu_id' => 'nullable|integer|exists:menus,id',
            'name' => 'required|string',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        // is change name
        if ($subMenu->name !== $validated['name']) {
            $validated['slug'] = generateSlug(Menu::class, $validated['name']);
        }

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
