<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        //User::factory()->times(10)->create();




        
        $data = [
            [
                'name' => 'Mohamed Fathy',
                'email' => 'mohammedfathy@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'roles_name' => 'Owner',
                //'Status' => 'Active'
    
            ],
            [
                'name' => 'Maha Osman',
                'email' => 'mahahussaien@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'roles_name' => 'User',
                //'Status' => 'Active'
            ],
            [
                'name' => 'Ahmed Alrajeh',
                'email' => 'ahmedalrajeh@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'roles_name' => 'User',
                //'Status' => 'Active'
            ],
            [
                'name' => 'Mohamed Maher',
                'email' => 'mahershweiki@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'roles_name' => 'User',
                //'Status' => 'Active'
            ],

        ];
        DB::table('users')->insert($data);
        

        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('pstic12345'),
            //'roles_name' => ['Owner'],
            //'Status' => 'Active'
        ]);  
        $user->assignRole('Owner');

    }
}


