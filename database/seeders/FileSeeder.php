<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Relationship;
use App\Models\Beneficiary;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $relationships = [
            'Principal Applicant',
            'Wife',
            'Husband',
            'Son',
            'Daughter'
        ];
        foreach ($relationships as $n) {
            Relationship::create(['name' => $n]);
        }
        
        
        
        $files = [
            [
                'number' => '914-12C00001',
                'created_user_id' => '1',
            ],
            [
                'number' => '914-12C00002',
                'created_user_id' => '1',
            ],

        ];

        foreach ($files as $n) {
            File::create($n);
        }



        $beneficiaries = [
            [
                'file_id' => '1',
                'name' => 'Amira',
                'age' => '34',
                'gender_id' => '2',
                'nationality_id' => '3',
            ],
            [
                'file_id' => '1',
                'name' => 'Mariam',
                'age' => '3',
                'gender_id' => '2',
                'nationality_id' => '3',
            ],

        ];

        foreach ($beneficiaries as $n) {
            Beneficiary::create($n);
        } 
    }
}
