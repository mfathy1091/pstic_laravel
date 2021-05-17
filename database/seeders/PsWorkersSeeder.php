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
                'name' => 'Ahmed Alrajeh',
                'gender_id' => '1',
                'nationality_id' => '1',
                'team_id' => '1',
                'email' => 'aalrajeh@gmail.com',
                'password' => 'pstic12345',
                'recruitment_date' => '2018-04-28',
            ],
            [
                'name' => 'Maha Osman',
                'gender_id' => '2',
                'nationality_id' => '2',
                'team_id' => '1',
                'email' => 'mosman@gmail.com',
                'password' => 'pstic12345',
                'recruitment_date' => '2019-03-18',
            ],
            [
                'name' => 'Malak Dalal',
                'gender_id' => '2',
                'nationality_id' => '1',
                'team_id' => '1',
                'email' => 'mdalal@gmail.com',
                'password' => 'pstic12345',
                'recruitment_date' => '2017-01-30',
            ],
            [
                'name' => 'Mohamed Ghassan',
                'gender_id' => '1',
                'nationality_id' => '1',
                'team_id' => '2',
                'email' => 'mghassan@gmail.com',
                'password' => 'pstic12345',
                'recruitment_date' => '2015-05-22',
            ],
        ];

        DB::table('ps_workers')->insert($data);
    }
}
