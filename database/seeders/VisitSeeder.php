<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
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
                'visit_date' => '10-05-2021',
                'comment' => 'Assessment',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],
            [
                'visit_date' => '11-05-2021',
                'comment' => 'Home Visit',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],
            [
                'visit_date' => '12-05-2021',
                'comment' => 'Phone Call',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],

        ];

        DB::table('visits')->insert($data);
    }
}
