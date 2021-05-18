<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->delete();

        $data = [
            [
                'date' => '10-05-2020',
                'ps_case_id' => '1',
            ],
            [
                'date' => '11-05-2020',
                'ps_case_id' => '1',
            ],
            [
                'date' => '12-05-2020',
                'ps_case_id' => '1',
            ],

        ];

        DB::table('visits')->insert($data);
    }
}
