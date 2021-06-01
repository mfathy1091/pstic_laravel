<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*     $roles = Role::all();

       User::all()->each(function ($user) use ($roles){
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });*/


        DB::table('role_user')->delete();

        //User::factory()->times(10)->create();

        
        $data = [
            [
                'user_id' => '1',
                'role_id' => '1',    
            ],
            [
                'user_id' => '1',
                'role_id' => '2',    
            ],


            [
                'user_id' => '2',
                'role_id' => '2',   
            ],
            [
                'user_id' => '3',
                'role_id' => '2',   
            ],
            [
                'user_id' => '4',
                'role_id' => '2',   
            ],
            [
                'user_id' => '5',
                'role_id' => '2',   
            ],
        ];

        DB::table('role_user')->insert($data);

    
    } 

}
