<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsWorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ps_workers')->delete();

        $data = [
            [
                'user_id' => '2',
                'gender_id' => '2',
                'nationality_id' => '2',
                'team_id' => '1',
                'area_id' => '18',
                'recruitment_date' => '2019-03-18',
            ],
            [
                'user_id' => '3',
                'gender_id' => '1',
                'nationality_id' => '1',
                'team_id' => '1',
                'area_id' => '18',
                'recruitment_date' => '2018-04-28',
            ],
            [
                'user_id' => '4',
                'gender_id' => '2',
                'nationality_id' => '1',
                'team_id' => '1',
                'area_id' => '17',
                'recruitment_date' => '2017-01-30',
            ],
            [
                'user_id' => '5',
                'gender_id' => '1',
                'nationality_id' => '1',
                'team_id' => '2',
                'area_id' => '1',
                'recruitment_date' => '2015-05-22',
            ],
        ];

        DB::table('ps_workers')->insert($data);
    }
}
