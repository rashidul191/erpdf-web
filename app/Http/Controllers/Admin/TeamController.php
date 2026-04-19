<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use App\Models\Admin\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Team::with('category:id,name')->latest())
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $color = match ($row->status->value) {
                        0 => 'text-red-500',
                        1 => 'text-green-500',
                        default => 'text-gray-600',
                    };

                    return "<span class='text-sm {$color}'>" . $row->status->description . "</span>";
                })
                ->rawColumns(['status'])
                ->toJson();
        }
        return view('admin.team.index');
    }
    public function create()
    {
        $teamCategories = TeamCategory::get();
        return view('admin.team.create', compact('teamCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial' => 'nullable|integer',
            'team_category_id' => 'nullable|integer|exists:team_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => ['nullable', Rule::in(CommonStatus::getValues())],
            'fb_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);

        // dd($validated);

        return response()->reportTo(
            Team::create($validated),
            'Created successfully',
            route('admin.team.index')
        );
    }

    public function edit(Team $team)
    {
        $teamCategories = TeamCategory::get();
        return view('admin.team.edit', compact('team', 'teamCategories'));
    }

    public function update(Request $request, Team $team)
    {

        // Validate input
        $validated = $request->validate([
            'serial' => 'nullable|integer',
            'team_category_id' => 'nullable|integer|exists:team_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => ['nullable', Rule::in(CommonStatus::getValues())],
            'fb_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);
        // Return response
        return response()->reportTo(
            $team->update($validated),
            'Updated successfully',
            route('admin.team.index')
        );
    }
    public function destroy(Team $team)
    {
        return response()->reportTo(
            $team->delete(),
            'Deleted successfully',
            route('admin.team.index')
        );
    }
}
