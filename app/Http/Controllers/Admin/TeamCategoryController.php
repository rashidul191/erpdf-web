<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(TeamCategory::oldest('name'))
                ->addIndexColumn()
                ->addColumn('custom_slug', function ($row) {
                    return '/team-category/' . $row->id . '/' . $row->slug;
                })
                ->toJson();
        }
        return view('admin.team-category.index');
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

        $validated['slug'] = Str::slug($validated['name']);

        return response()->reportTo(
            TeamCategory::create($validated),
            'Created successfully',
            route('admin.team-categories.index')
        );
    }

    public function edit(TeamCategory $teamCategory)
    {
        return view('admin.team-category.edit', compact('$teamCategory'));
    }

    public function update(Request $request, TeamCategory $teamCategory)
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
            $teamCategory->update($validated),
            'Updated successfully',
            route('admin.team-categories.index')
        );
    }
    public function destroy(TeamCategory $teamCategory)
    {
        return response()->reportTo(
            $teamCategory->delete(),
            'Deleted successfully',
            route('admin.team-categories.index')
        );
    }
}
