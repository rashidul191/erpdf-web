<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\ContentManage;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentManageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(ContentManage::with(['menu:id,name'])->latest())
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
        return view('admin.content-manage.index');
    }

    public function create()
    {
        $menus = Menu::oldest('name')->get();
        return view('admin.content-manage.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|integer|exists:menus,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string',
            'status' => 'required|integer',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',

        ]);

        $validated['slug'] = generateSlug(ContentManage::class, $validated['title']);

        return response()->reportTo(
            ContentManage::create($validated),
            'Created successfully',
            route('admin.content-manage.index')
        );
    }

    public function edit(ContentManage $contentManage)
    {
        $menus = Menu::oldest('name')->get();
        return view('admin.content-manage.edit', compact('contentManage', 'menus'));
    }

    public function update(Request $request, ContentManage $contentManage)
    {

    // dd($request->all());
        // Validate input
        $validated = $request->validate([
            'menu_id' => 'required|integer|exists:menus,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string',
            'status' => 'required|integer',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
        ]);



        // is change name
        if ($contentManage->title !== $validated['title']) {
            $validated['slug'] = generateSlug(ContentManage::class, $validated['title']);
        }

        // Return response
        return response()->reportTo(
            $contentManage->update($validated),
            'Updated successfully',
            route('admin.content-manage.index')
        );
    }


    public function destroy(ContentManage $contentManage)
    {
        return response()->reportTo(
            $contentManage->delete(),
            'Deleted successfully',
            route('admin.content-manage.index')
        );
    }
}
