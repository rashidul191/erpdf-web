<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Category::oldest('name'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.category.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        return response()->reportTo(
            Category::create($validated),
            'Created successfully',
            route('admin.categories.index')
        );
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Return response
        return response()->reportTo(
            $category->update($validated),
            'Updated successfully',
            route('admin.categories.index')
        );
    }
    public function destroy(Category $category)
    {
        return response()->reportTo(
            $category->delete(),
            'Deleted successfully',
            route('admin.categories.index')
        );
    }
}
