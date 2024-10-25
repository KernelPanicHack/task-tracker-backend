<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!$user = User::where('email', $credentials['email'])->first()) {
            throw ValidationException::withMessages(['email' => 'User does not exist.']);
        }

        if (Auth::attempt($credentials)) {
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['email' => 'You are not authorized to access this section.']);
            }
        }

        throw ValidationException::withMessages(['password' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $roles = Role::all()->pluck('name');
        $users = User::with('roles')->get();
        return view('admin.dashboard',compact('users', 'roles'));
    }

    public function users()
    {
        $roles = Role::all()->pluck('name');
        $users = User::with('roles')->get();
        return view('admin.users', compact('users', 'roles'));
    }
    public function editUserRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.edit-user-roles', compact('user', 'roles'));
    }

    public function updateUserRoles(Request $request, $id)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->roles);

        return redirect()->route('admin.users')->with('success', 'Roles updated successfully.');
    }


}
