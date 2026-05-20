<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientSay;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientSayController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables(ClientSay::latest())
                ->addIndexColumn()
                ->addColumn('review_text', function ($row) {
                    return Str::limit(strip_tags($row->review_text ?? '--'), 50);
                })
                ->toJson();
        }
        return view('admin.client-say.index');
    }
    public function create()
    {
        return view('admin.client-say.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'review_text' => 'nullable|string',
        ]);

        return response()->reportTo(
            ClientSay::create($validated),
            'Created successfully',
            route('admin.client-say.index')
        );
    }

    public function edit(ClientSay $clientSay)
    {
        return view('admin.client-say.edit', compact('clientSay'));
    }

    public function update(Request $request, ClientSay $clientSay)
    {

        // Validate input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'review_text' => 'nullable|string',
        ]);
        // Return response
        return response()->reportTo(
            $clientSay->update($validated),
            'Updated successfully',
            route('admin.client-say.index')
        );
    }
    public function destroy(ClientSay $clientSay)
    {
        return response()->reportTo(
            $clientSay->delete(),
            'Deleted successfully',
            route('admin.client-say.index')
        );
    }
}
