<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Administrator',
            'PSW'
        ];
        
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $administratorRole = Role::findById(1);
        $administratorRole->syncPermissions([
            'users-menu', 'user-list', 'user-delete', 'user-edit', 'user-create',
            'role-list', 'role-delete', 'role-edit', 'role-create',
            'settings-menu',
        
            'file-search', 'pss-case-list', 'pss-case-create','housing-case-list','housing-case-create',
            'psychosocial-menu',
        ]);

        $psWorkerRole = Role::findById(2);
        $psWorkerRole->syncPermissions([
            'file-search',
            'pss-case-list',
            'pss-case-create',
            'psw-menu',
        ]);


    }
}
