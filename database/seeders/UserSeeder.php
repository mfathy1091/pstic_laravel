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

        //User::factory()->times(10)->create();




        
        $data = [
            [
                'name' => 'Mohamed Fathy',
                'email' => 'mohammedfathy@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
    
            ],
            [
                'name' => 'Maha Osman',
                'email' => 'mahahussaien@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],
            [
                'name' => 'Ahmed Alrajeh',
                'email' => 'ahmedalrajeh@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],
            [
                'name' => 'Mohamed Maher',
                'email' => 'mahershweiki@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],
            [
                'name' => 'Gihan Babiker',
                'email' => 'gihanbabiker@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],
            [
                'name' => 'Nourhanne Hetta',
                'email' => 'nourhannehetta@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],
            [
                'name' => 'Yara Negm',
                'email' => 'yaranegm@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
            ],

        ];
        DB::table('users')->insert($data);
        

        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('pstic12345'),
            //'Status' => 'Active'
        ]);  
        $admin->assignRole('Administrator');
        $admin->assignRole('PS Supervisor');
        $admin->assignRole('PSW');


        
        $ahmedAlrajeh = User::find(3);
        $ahmedAlrajeh->assignRole('PSW');

        $gihan = User::find(5);
        $gihan->assignRole('Administrator');
        $gihan->assignRole('PS Supervisor');

        $nourhanne = User::find(6);
        $nourhanne->assignRole('Administrator');
        $nourhanne->assignRole('PS Supervisor');
        
        $yara = User::find(7);
        $yara->assignRole('Administrator');
        $yara->assignRole('PS Supervisor');
        
    }
}


