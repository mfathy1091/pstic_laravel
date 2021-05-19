<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PsCaseActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ps_case_activities')->delete();

        $data = [
            [
                'case_id' => '1',
                'month_id' => '2',
                'case_status_id' => '1',
            ],
            [
                'case_id' => '1',
                'month_id' => '3',
                'case_status_id' => '2',
            ],
            [
                'case_id' => '1',
                'month_id' => '4',
                'case_status_id' => '2',
            ],
            [
                'case_id' => '1',
                'month_id' => '5',
                'case_status_id' => '2',
            ],
        ];

        DB::table('ps_case_activities')->insert($data);
    }
}
