<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Menu::oldest('name')->oldest('serial'))
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
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        $validated['slug'] = generateSlug(Menu::class, $validated['name']);

        // dd($validated['slug']);

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
            'name' => 'required|string',
            'serial' => 'nullable|integer',
            'status' => 'required|integer',
        ]);

        // is change name
        if ($menu->name !== $validated['name']) {
            $validated['slug'] = generateSlug(Menu::class, $validated['name']);
        }

        // Return response
        return response()->reportTo(
            $menu->update($validated),
            'Updated successfully',
            route('admin.menu.index')
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
