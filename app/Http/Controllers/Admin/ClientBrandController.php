<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientBrand;
use Illuminate\Http\Request;

class ClientBrandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(ClientBrand::latest())
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.client-brand.index');
    }
    public function create()
    {
        return view('admin.client-brand.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'nullable|string|max:255',
            'link'   => 'nullable|url',
        ]);

        return response()->reportTo(
            ClientBrand::create($validated),
            'Created successfully',
            route('admin.client-brand.index')
        );
    }

    public function edit(ClientBrand $clientBrand)
    {
        return view('admin.client-brand.edit', compact('clientBrand'));
    }

    public function update(Request $request, ClientBrand $clientBrand)
    {

        // Validate input
        $validated = $request->validate([
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'nullable|string|max:255',
            'link'   => 'nullable|url',
        ]);
        // Return response
        return response()->reportTo(
            $clientBrand->update($validated),
            'Updated successfully',
            route('admin.client-brand.index')
        );
    }
    public function destroy(ClientBrand $clientBrand)
    {
        return response()->reportTo(
            $clientBrand->delete(),
            'Deleted successfully',
            route('admin.client-brand.index')
        );
    }
}
