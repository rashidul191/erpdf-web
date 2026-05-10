<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(DocumentCategory::oldest('name'))
                ->addIndexColumn()
                ->addColumn('custom_slug', function ($row) {
                    return '/document-category/' . $row->id . '/' . $row->slug;
                })
                ->toJson();
        }
        return view('admin.document-category.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);


        $validated['slug'] = generateSlug(DocumentCategory::class, $validated['name']);


        return response()->reportTo(
            DocumentCategory::create($validated),
            'Created successfully',
            route('admin.document-categories.index')
        );
    }

    public function edit(DocumentCategory $documentCategory)
    {
        return view('admin.document-category.edit', compact('documentCategory'));
    }

    public function update(Request $request, DocumentCategory $documentCategory)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = generateSlug(DocumentCategory::class, $validated['name'], $documentCategory);
        }

        // Return response
        return response()->reportTo(
            $documentCategory->update($validated),
            'Updated successfully',
            route('admin.document-categories.index')
        );
    }
    public function destroy(DocumentCategory $documentCategory)
    {
        return response()->reportTo(
            $documentCategory > delete(),
            'Deleted successfully',
            route('admin.document-categories.index')
        );
    }
}
