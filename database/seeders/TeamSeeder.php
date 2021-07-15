<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'NC',
                'department_id' => '1',
            ],
            [
                'name' => 'Eatmad',
                'department_id' => '1',
            ],
            [
                'name' => 'Emad',
                'department_id' => '1',
            ],
            [
                'name' => 'Morgos',
                'department_id' => '1',
            ],
            [
                'name' => 'Nyouk',
                'department_id' => '1',
            ],
            [
                'name' => 'Alan',
                'department_id' => '1',
            ],
            [
                'name' => 'Zelal',
                'department_id' => '1',
            ],
            [
                'name' => 'Program',
                'department_id' => '3',
            ],
            [
                'name' => 'Housing NC',
                'department_id' => '3',
            ],
            [
                'name' => 'N/A',
                'department_id' => Department::NA_ID,
            ]
        ];

        foreach ($data as $n) {
            Team::create($n);
        }
    }
}
