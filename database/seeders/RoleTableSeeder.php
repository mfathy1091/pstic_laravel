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
            'Owner',
            'PS Worker'
        ];
        
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $ownerRole = Role::findById(1);
        $ownerRole->syncPermissions(['user-list', 'user-delete', 'user-edit', 'user-create',
                                    'role-list', 'role-delete', 'role-edit', 'role-create',
                                    'settings-menu',
                                    'surveys-menu', 'surveys-list']);

        $psWorkerRole = Role::findById(2);
        $psWorkerRole->syncPermissions(['ps-case-list', 'ps-case-delete', 'ps-case-edit', 'ps-case-create']);
    }
}
