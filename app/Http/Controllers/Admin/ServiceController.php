<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Service::oldest())
                ->addIndexColumn()
                ->addColumn('sub_title', function ($row) {
                    return Str::limit(strip_tags($row->sub_title ?? '--'), 50);
                })
                ->toJson();
        }
        return view('admin.services.index');
    }
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'required|string|max:255',
            'sub_title'  => 'required|string',
        ]);

        return response()->reportTo(
            Service::create($validated),
            'Created successfully',
            route('admin.services.index')
        );
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {

        // Validate input
        $validated = $request->validate([
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'title'   => 'nullable|string|max:255',
            'sub_title'  => 'nullable|string',


        ]);
        // Return response
        return response()->reportTo(
            $service->update($validated),
            'Updated successfully',
            route('admin.services.index')
        );
    }
    public function destroy(Service $service)
    {
        return response()->reportTo(
            $service->delete(),
            'Deleted successfully',
            route('admin.services.index')
        );
    }
}
