<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // <-- import it at the top

use App\Models\User;

class UsersSeeder extends Seeder
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
    
            ],
            [
                'name' => 'Maha Osman',
                'email' => 'mahahussaien@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
            ],
            [
                'name' => 'Ahmed Alrajeh',
                'email' => 'ahmedalrajeh@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
            ],
            [
                'name' => 'Malak Dalal',
                'email' => 'malakdalal@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
            ],
            [
                'name' => 'Mohamed Ghassan',
                'email' => 'ghassan@gmail.com',
                'password' => Hash::make('pstic12345'),
            ],

        ];



        DB::table('users')->insert($data);
         

    }
}


