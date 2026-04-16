<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Enums\TeamCategoryType;
use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Team::latest())
                ->addIndexColumn()
                ->addColumn('category_type', fn($row) => $row->category_type->description)
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
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial'        => 'nullable|integer',
            'category_type'  => ['nullable', Rule::in(TeamCategoryType::getValues())],
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name'          => 'required|string|max:255',
            'designation'   => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'status' => ['nullable', Rule::in(CommonStatus::getValues())],
            'fb_link'        => 'nullable|url|max:255',
            'linkedin_link'  => 'nullable|url|max:255',
            'twitter_link'   => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);

        return response()->reportTo(
            Team::create($validated),
            'Created successfully',
            route('admin.team.index')
        );
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {

        // Validate input
        $validated = $request->validate([
            'serial'        => 'nullable|integer',
            'category_type'  => ['nullable', Rule::in(TeamCategoryType::getValues())],
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // if uploading an image
            'name'          => 'required|string|max:255',
            'designation'   => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'status' => ['nullable', Rule::in(CommonStatus::getValues())],
            'fb_link'        => 'nullable|url|max:255',
            'linkedin_link'  => 'nullable|url|max:255',
            'twitter_link'   => 'nullable|url|max:255',
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
