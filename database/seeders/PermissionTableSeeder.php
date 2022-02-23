<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [


            [
                'group_name'=>'Shipping-Rule',
                'permissions'=>[
                    'rule-list',
                    'rule-create',
                    'rule-edit',
                    'rule-delete',
                ]
            ],

            [
                'group_name'=>'Shipping-Calculator',
                'permissions'=>[
                    'calculator-list',
                    'calculator-create',
                    'calculator-edit',
                    'calculator-delete',
                ]
            ],

            [
                'group_name'=>'Role',
                'permissions'=>[
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                ]
            ],

            [
                'group_name'=>'User',
                'permissions'=>[
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
                ]
            ],

            [
                'group_name'=>'Profile',
                'permissions'=>[
                    'profile-view',
                ]
            ],

        ];

        foreach ($permissions as $permission){
            $group_name = $permission['group_name'];
            foreach ($permission['permissions'] as $permit)
            Permission::create(['name'=>$permit,'group_name'=>$group_name]);
        }
    }
}
