<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\DB;


class GroupUserSeeder extends Seeder
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


        DB::table('group_user')->delete();

        //User::factory()->times(10)->create();

        
        $data = [
            [
                'user_id' => '1',
                'group_id' => '1',    
            ],
            [
                'user_id' => '1',
                'group_id' => '2',    
            ],


            [
                'user_id' => '2',
                'group_id' => '2',   
            ],
            [
                'user_id' => '3',
                'group_id' => '2',   
            ],
            [
                'user_id' => '4',
                'group_id' => '2',   
            ],
            [
                'user_id' => '5',
                'group_id' => '2',   
            ],
        ];

        //DB::table('group_user')->insert($data);

    
    } 

}
