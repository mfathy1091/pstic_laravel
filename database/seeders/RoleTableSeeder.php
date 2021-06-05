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

        $role = Role::findById(1);
        $role->givePermissionTo('role-list');
        $role->givePermissionTo('role-delete');
        $role->givePermissionTo('role-edit');
        $role->givePermissionTo('role-create');
    }
}
