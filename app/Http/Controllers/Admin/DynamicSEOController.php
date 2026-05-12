<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DynamicSEO;
use Illuminate\Http\Request;

class DynamicSEOController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(DynamicSEO::latest())->addIndexColumn()
                ->addColumn('page_link', function ($row) {
                    return $row->page_link  ? url($row->page_link) : '--';
                })
                ->addColumn('meta_script', function ($row) {
                    // return Str::limit($row->meta_script, 50, '...');
                    // return $row->meta_script ?? '--';
                })
                ->rawColumns(['meta_script']) // এখানে HTML render হবে
                ->toJson();
        }
        return view('admin.dynamic-seo.index');
    }
    public function create()
    {
        return view('admin.dynamic-seo.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_link'   => 'required|string|max:255|unique:dynamic_s_e_o_s,page_link',
            'meta_script'   => 'required|string',
        ]);
        // Domain remove করে শুধু path নাও
        $path = parse_url($validated['page_link'], PHP_URL_PATH);

        $slug = ltrim($path, '/');
        $validated['page_link'] = $slug;

        return response()->reportTo(
            DynamicSEO::create($validated),
            'Created successfully',
            route('admin.dynamic-seo.index')
        );
    }

    public function edit($id)
    {
        $dynamicSEO = DynamicSEO::findOrFail($id);
        return view('admin.dynamic-seo.edit', compact('dynamicSEO'));
    }

    public function update(Request $request, $id)
    {

        $dynamicSEO = DynamicSEO::findOrFail($id);
        // Validate input
        $validated = $request->validate([
            'page_link'   => 'required|string|max:255|unique:dynamic_s_e_o_s,page_link',
            'meta_script'   => 'required|string',
        ]);

        if ($validated['page_link']) {
            // Domain remove করে শুধু path নাও
            $path = parse_url($validated['page_link'], PHP_URL_PATH);

            $slug = ltrim($path, '/');
            $validated['page_link'] = $slug;
        }
        // Return response
        return response()->reportTo(
            $dynamicSEO->update($validated),
            'Updated successfully',
            route('admin.dynamic-seo.index')
        );
    }
    public function destroy($id)
    {

        $dynamicSEO = DynamicSEO::findOrFail($id);

        return response()->reportTo(
            $dynamicSEO->delete(),
            'Deleted successfully',
            route('admin.dynamic-seo.index')
        );
    }
}
