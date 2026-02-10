<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Tag::oldest('position'))->addIndexColumn()
                ->addColumn('is_home', function ($row) {
                    $color = match ($row->is_home->value) {
                        0 => 'text-red-600 ',
                        1 => 'text-green-600 ',
                        default => 'text-gray-600 '
                    };
                    return '<span class="px-2 py-1 rounded font-medium ' . $color . '">' .
                        $row->is_home->key . '</span>';
                })
                ->rawColumns(['is_home'])
                ->toJson();
        }
        return view('admin.tag.index');
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'is_home'   => ['nullable', 'numeric'],
            'position'  => ['nullable', 'numeric', Rule::unique('tags', 'position')],
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        try {
            return response()->reportTo(
                Tag::create($validated),
                'Created successfully',
                route('admin.tag.index')
            );
        } catch (\Exception $e) {
            return response()->error('Something went wrong!' . $e->getMessage());
        }
    }

    public function edit(Tag $tag)
    {

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        // Validate input
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'is_home'   => ['nullable', 'numeric'],
            'position'  => ['nullable', 'numeric'],
        ]);

        if (!empty($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Return response
        return response()->reportTo(
            $tag->update($validated),
            'Updated successfully',
            route('admin.tag.index')
        );
    }      public function destroy(Tag $tag)
    {
        return response()->reportTo(
            $tag->delete(),
            'Deleted successfully',
            route('admin.tag.index')
        );
    }
}
