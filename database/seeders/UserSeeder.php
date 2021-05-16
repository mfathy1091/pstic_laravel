<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // <-- import it at the top

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

        $data = [
            [
                'name' => 'Mohamed Fathy',
                'email' => 'mfathy@gmail.com',
                'password' => Hash::make('pstic12345'),
    
            ],
            [
                'name' => 'Mohamed Tito',
                'email' => 'tito@gmail.com',
                'password' => Hash::make('pstic12345'),
            ],
        ];

        DB::table('users')->insert($data);
        

    }
}


