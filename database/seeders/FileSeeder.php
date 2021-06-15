<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\FileMember;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            [
                'number' => '91412C00001',
                'created_user_id' => '1',
            ],
            [
                'number' => '91412C00002',
                'created_user_id' => '1',
            ],

        ];

        foreach ($files as $n) {
            File::create($n);
        }


        $members = [
            [
                'file_id' => '1',
                'name' => 'Ibrahim Mohamed',
                'age' => '50',
                'gender_id' => '1',
                'nationality_id' => '2',
            ],
            [
                'file_id' => '1',
                'name' => 'Maszen Ibrahim',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '2',
            ],
            [
                'file_id' => '1',
                'name' => 'Fatma Ibrahim',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '2',
            ],
            [
                'file_id' => '1',
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
            ],  

        ];

        foreach ($members as $n) {
            FileMember::create($n);
        } 
    }
}
