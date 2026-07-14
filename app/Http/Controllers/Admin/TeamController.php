<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use App\Models\Admin\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Team::with('categories')->latest())
                ->addIndexColumn()
                ->addColumn('categories', function ($row) {

                    if (!$row->categories) {
                        return null;
                    }

                    $result = '';

                    foreach ($row->categories as $item) {
                        $result .= $item->name . ', ';
                    }

                    return rtrim($result, ', ');
                })
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

            'team_category_id' => 'nullable|array',
            'team_category_id.*' => 'exists:team_categories,id',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => ['nullable', Rule::in(CommonStatus::getValues())],
            'fb_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);

        try {
            DB::beginTransaction();

            $data = $validated;
            unset($data['team_category_id']);

            $data['slug'] = generateSlug(Team::class, $validated['name']);

            // create team
            $team = Team::create($data);

            // attach categories (IMPORTANT)
            $team->categories()->attach($validated['team_category_id'] ?? []);

            DB::commit();

            return response()->reportTo(
                $team,
                'Created successfully',
                route('admin.team.index')
            );

        } catch (\Exception $error) {

            DB::rollback();
            report($error);

            return response()->error('Something went wrong! ' . $error->getMessage());
        }
    }

    public function edit(Team $team)
    {
        $teamCategories = TeamCategory::all();
        $selectedCategories = $team->categories->pluck('id');
        return view('admin.team.edit', compact('team', 'teamCategories', 'selectedCategories'));
    }

    public function update(Request $request, Team $team)
    {

        // Validate input
        $validated = $request->validate([
            'serial' => 'nullable|integer',

            'team_category_id' => 'nullable|array',
            'team_category_id.*' => 'exists:team_categories,id',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'status' => ['nullable', Rule::in(CommonStatus::getValues())],

            'fb_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
        ]);
        try {

            DB::beginTransaction();

            $data = $validated;

            unset($data['team_category_id']);

            $data['slug'] = generateSlug(Team::class, $validated['name'], $team);
            // update team
            $team->update($data);

            // sync categories (IMPORTANT)
            $team->categories()->sync($validated['team_category_id'] ?? []);

            DB::commit();

            return response()->reportTo(
                $team,
                'Updated successfully',
                route('admin.team.index')
            );

        } catch (\Exception $error) {

            DB::rollback();
            report($error);

            return response()->error('Something went wrong! ' . $error->getMessage());
        }
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
