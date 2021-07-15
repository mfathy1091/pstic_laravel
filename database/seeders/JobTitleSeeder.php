<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTitle;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'PS Worker',
            'Housing Advocate',
            'Program Manager',
            'Program Officer',
            'Team Leader',
            'Deputy Team Leader',
            'Coordinator',
            'N/A'
        ];
        
        foreach ($data as $n) {
            JobTitle::create(['name' => $n]);
        }
    }
}
