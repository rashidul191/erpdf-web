<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Brand::oldest('name'))
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.brand.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        return response()->reportTo(
            Brand::create($validated),
            'Created successfully',
            route('admin.brands.index')
        );
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
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
            $brand->update($validated),
            'Updated successfully',
            route('admin.brands.index')
        );
    }
    public function destroy(Brand $brand)
    {
        return response()->reportTo(
            $brand->delete(),
            'Deleted successfully',
            route('admin.brands.index')
        );
    }
}
