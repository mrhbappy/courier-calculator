<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ruman',
            'role' => '["Admin"]',
            'email' => 'md.rhbappy@gmail.com',
            'password' => bcrypt('12345678'),
            'is_active'=>1,
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole('Admin');
    }
}
