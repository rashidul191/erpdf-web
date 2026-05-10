<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(BlogCategory::oldest('name'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.blog-category.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
        $validated['slug'] = generateSlug(BlogCategory::class, $validated['name']);

        return response()->reportTo(
            BlogCategory::create($validated),
            'Created successfully',
            route('admin.blog-categories.index')
        );
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = generateSlug(BlogCategory::class, $validated['name'], $blogCategory);
        }

        // Return response
        return response()->reportTo(
            $blogCategory->update($validated),
            'Updated successfully',
            route('admin.blog-categories.index')
        );
    }
    public function destroy(BlogCategory $blogCategory)
    {
        return response()->reportTo(
            $blogCategory->delete(),
            'Deleted successfully',
            route('admin.blog-categories.index')
        );
    }
}
