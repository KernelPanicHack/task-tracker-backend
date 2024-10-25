<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manage-roles-permissions', compact('roles', 'permissions'));
    }

    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles')->with('success', 'Role created successfully.');
    }

    public function createPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.roles')->with('success', 'Permission created successfully.');
    }

    public function assignPermission(Request $request)
    {
        $role = Role::findByName($request->role);
        $role->givePermissionTo($request->permission);

        return redirect()->route('admin.roles')->with('success', 'Permission assigned to role successfully.');
    }

    public function listRolesWithPermissions()
    {
        $roles = Role::with('permissions')->get();

        return view('admin.list-roles-permissions', compact('roles'));
    }

}
