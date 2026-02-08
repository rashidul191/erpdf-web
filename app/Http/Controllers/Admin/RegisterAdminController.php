<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Admin::where('role', \App\Enums\RoleStatus::RegisterAdmin)->latest())
                ->addIndexColumn()
                ->toJson();
        }

        return view('admin.register-admin.index');
    }

    public function create()
    {
        return view('admin.register-admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'       => ['required', 'string', 'max:255'],
            'name'           => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'regex:/^01[0-9]{9}$/', Rule::unique('admins', 'phone')],
            'email'          => ['required', 'string', Rule::unique('admins', 'email')],
            'password'       => ['required', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = Admin::create($validated);

        return response()->reportTo($user, 'Create successfully', route('admin.register-admin.index'));
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);

        return view('admin.register-admin.edit', compact('user',));
    }
    public function update(Request $request, $id)
    {
        $user = Admin::findOrFail($id);
        $validated = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'regex:/^01[0-9]{9}$/', Rule::unique('admins', 'phone')->ignore($id)],
            'email'          => ['required', 'string', Rule::unique('admins', 'email')->ignore($id)],
            'password'       => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        return response()->report($user->forceFill($validated)->update(), 'Updated successfully');
    }

    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        return response()->report($user->delete(), 'Deleted successfully');
    }
}
