<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(Document::with('category:id,name')->oldest('serial'))
                ->addIndexColumn()
                ->addColumn('file', function ($row) {
                    return '<iframe src="' . asset($row->file) . '" width="100px" height="60px"></iframe>';
                })
                ->rawColumns(['file'])
                ->toJson();
        }
        return view('admin.document.index');
    }

    public function create()
    {
        $documentCategories = DocumentCategory::all();
        return view('admin.document.create', compact('documentCategories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'document_category_id' => 'required|exists:document_categories,id',
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:20480',
            'serial' => 'nullable|numeric',
            'status' => 'required|numeric',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = generateSlug(Document::class, $validated['name']);
        }

        return response()->reportTo(
            Document::create($validated),
            'Created successfully',
            route('admin.document.index')
        );
    }

    public function edit(Document $document)
    {
        $documentCategories = DocumentCategory::all();
        return view('admin.document.edit', compact('documentCategories', 'document'));
    }

    public function update(Request $request, Document $document)
    {
        // Validate input
        $validated = $request->validate([
            'document_category_id' => 'required|exists:document_categories,id',
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:20480',
            'serial' => 'nullable|numeric',
            'status' => 'required|numeric',
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = generateSlug(Document::class, $validated['name'], $document);
        }

        // Return response
        return response()->reportTo(
            $document->update($validated),
            'Updated successfully',
            route('admin.document.index')
        );
    }
    public function destroy(Document $document)
    {
        return response()->reportTo(
            $document > delete(),
            'Deleted successfully',
            route('admin.document.index')
        );
    }
}
