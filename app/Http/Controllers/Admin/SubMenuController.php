<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Enums\IsAgreeStatus;
use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubMenuController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(MenuItem::whereNotNull('menu_id')->whereNull('sub_menu_id')->with(['page', 'menu.page'])->oldest('serial'))
                ->addIndexColumn()
                ->addColumn('main_menu_name', function ($row) {
                    return $row->menu->is_custom == IsAgreeStatus::Yes() ? $row->menu->name : $row->menu->page->title;
                })
                ->addColumn('sub_menu_name', function ($row) {
                    return $row->is_custom == IsAgreeStatus::Yes() ? $row->name : $row->page->title;
                })
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
        $menus = MenuItem::whereNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();
        return view('admin.sub-menu.create', compact('menus', 'pages'));
    }

    public function store(Request $request)
    {

        $rules = [
            'is_custom' => 'nullable|integer',
            'serial' => 'nullable|integer',
            'status' => 'nullable|integer',
            'menu_id' => 'nullable|integer|exists:menu_items,id',
        ];

        if ($request->is_custom == IsAgreeStatus::Yes) {
            $rules['name'] = 'required|string';
            $rules['slug'] = 'nullable|string';

        } else {
            $rules['page_id'] = 'required|integer|exists:pages,id';
        }


        $validated = $request->validate($rules);

        if ($request->is_custom == IsAgreeStatus::Yes) {
            $validated['slug'] = !empty($validated['slug'])
                ? generateSlug(MenuItem::class, $validated['slug'])
                : generateSlug(MenuItem::class, $validated['name']);
        }


        return response()->reportTo(
            MenuItem::create($validated),
            'Created successfully',
            route('admin.sub-menu.index')
        );
    }

    public function edit(MenuItem $subMenu)
    {

        $pages = Page::where('status', CommonStatus::Active())
            ->where(function ($query) use ($subMenu) {
                $query->whereDoesntHave('menu') // unused pages
                    ->orWhere('id', $subMenu->page_id); // 🔥 include current one
            })
            ->oldest('title')
            ->get();
        $menus = MenuItem::whereNull('menu_id')->whereNull('sub_menu_id')->with('page')->get();
        return view('admin.sub-menu.edit', compact('subMenu', 'pages', 'menus'));
    }

    public function update(Request $request, MenuItem $subMenu)
    {
        // Validate input
        $rules = [
            'is_custom' => 'nullable|integer',
            'serial' => 'nullable|integer',
            'status' => 'nullable|integer',
            'menu_id' => 'nullable|integer|exists:menu_items,id',
        ];

        if ($request->is_custom == IsAgreeStatus::Yes) {
            $rules['name'] = 'required|string';
            $rules['slug'] = 'nullable|string';

        } else {
            $rules['page_id'] = 'required|integer|exists:pages,id';
        }


        $validated = $request->validate($rules);

        if ($request->is_custom == IsAgreeStatus::Yes) {
            $validated['slug'] = !empty($validated['slug'])
                ? generateSlug(MenuItem::class, $validated['slug'])
                : generateSlug(MenuItem::class, $validated['name']);
        }



        // Return response
        return response()->reportTo(
            $subMenu->update($validated),
            'Updated successfully',
            route('admin.sub-menu.index')
        );
    }


    public function destroy(MenuItem $subMenu)
    {
        return response()->report(
            $subMenu->delete(),
            'Deleted successfully',
        );
    }
}
