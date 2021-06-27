<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Spatie\Permission\Models\Permission;

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
            'users-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'settings-menu',

            'file-search',
            
            'psychosocial-menu',

            'psw-menu',
        ];

        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
