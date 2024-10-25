<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'update title']);

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('update posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());


        $user = User::find(1);
        $user->assignRole('admin');
    }
}
