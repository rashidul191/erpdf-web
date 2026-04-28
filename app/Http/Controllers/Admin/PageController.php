<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Page::latest())
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
        return view('admin.page.index');
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string',
            'status' => 'required|integer',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'others' => 'nullable|string',
        ]);

        $validated['slug'] = generateSlug(Page::class, $validated['title']);

        return response()->reportTo(
            Page::create($validated),
            'Created successfully',
            route('admin.page.index')
        );
    }

    public function edit(Page $page)
    {

        return view('admin.page.edit', compact('page', ));
    }

    public function update(Request $request, Page $page)
    {

        $validated = $request->validate([
            'page_banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title' => 'required|string',
            'status' => 'required|integer',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'others' => 'nullable|string',
        ]);

        // is change name
        if ($page->title !== $validated['title']) {
            $validated['slug'] = generateSlug(Page::class, $validated['title'], $page);
        }
        // Return response
        return response()->reportTo(
            $page->update($validated),
            'Updated successfully',
            route('admin.page.index')
        );
    }


    public function destroy(Page $page)
    {
        return response()->reportTo(
            $page->delete(),
            'Deleted successfully',
            route('admin.page.index')
        );
    }
}
