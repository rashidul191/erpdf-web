<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\User;
use App\Traits\ChecksPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    // use ChecksPermission;
    protected $permissionPrefix = 'user';

    protected $mapExtraActionPermission = [
        'portal' => 'user-read',
        'userSearch' => 'user-read',
    ];

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(User::latest())
                ->addIndexColumn()
                ->toJson();
        }

        return view('admin.user.index');
    }

    public function getSubAreas($area_id)
    {
        $subAreas = SubArea::where('area_id', $area_id)
            ->orderBy('sub_area_name', 'ASC')
            ->get();
        return response()->json($subAreas);
    }
    public function create()
    {
        $areas = Area::oldest('area_name')->get();
        return view('admin.user.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'       => ['required', 'string', 'max:255', Rule::unique('users', 'username')],
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['nullable', 'string', 'email', 'max:199', Rule::unique('users', 'email')],
            'phone'          => ['required', 'regex:/^01[0-9]{9}$/', Rule::unique('users', 'phone')],
            'address'        => ['required', 'string', 'max:255'],
            'status'         => ['required', 'numeric'],
            'password'       => ['required', 'confirmed', Password::defaults()],
            'avatar'        => ['required', 'mimetypes:image/*', 'max:5120'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->reportTo($user, 'User Create successfully', route('admin.user.index'));
    }
    public function show(User $user, Request $request)
    {
        $subArea = SubArea::where('id', $user->sub_area)->with('area:id,area_name')->first();
        return view('admin.user.show', compact('user', 'subArea'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'       => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', 'max:199', Rule::unique('users')->ignore($user->id)],
            'phone'          => ['required', 'string', 'max:199', Rule::unique('users')->ignore($user->id)],
            'address'        => ['nullable', 'string', 'max:255'],
            'status'         => ['nullable'],
            'password'       => ['nullable', 'confirmed', Password::defaults()],
            // File inputs optional
            'avatar'         => ['nullable', 'image', 'max:2048'],
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        return response()->report($user->forceFill($validated)->update(), 'User updated successfully');
    }

    public function destroy(User $user)
    {
        return response()->report($user->delete(), 'User deleted successfully');
    }

    public function portal(User $user)
    {
        abort_if(!Auth::user()->isA('admin'), 403);
        $cid = uniqid();
        Cache::put($cid, $user->id, 60);
        $url = URL::temporarySignedRoute(
            'portal',
            now()->addMinute(),
            ['user' => $user->id, 'cid' => $cid]
        );
        return <<<HTML
<body style="padding: 2rem;">
Open <a href="$url" target="_blank">$url</a> in incognito window.
<script type="text/javascript">
window.onblur = function() {
  window.close();
}
</script>
</body>
HTML;
    }
}
