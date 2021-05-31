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

        User::factory()->times(10)->create();

        
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


