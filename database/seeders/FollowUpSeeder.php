<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_ups')->delete();

        $data = [
            [
                'beneficiary_id' => '1',
                'follow_up_date' => '10-06-2021',
                'comment' => 'Assessment',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],
            [
                'beneficiary_id' => '1',
                'follow_up_date' => '11-06-2021',
                'comment' => 'Home Visit',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],
            [
                'beneficiary_id' => '1',
                'follow_up_date' => '12-07-2021',
                'comment' => 'Phone Call',
                'pss_case_id' => '1',
                'record_id' => '1',
            ],

        ];

        DB::table('follow_ups')->insert($data);
    }
}
