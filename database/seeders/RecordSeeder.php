<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Record;


class RecordSeeder extends Seeder
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
                'month_id' => '3',
                'pss_case_id' => '1',
                'status_id' => '1',
                'is_emergency' => '1',
            ],
            [
                'month_id' => '4',
                'pss_case_id' => '1',
                'status_id' => '2',
                'is_emergency' => '0',
            ],
            [
                'month_id' => '5',
                'pss_case_id' => '1',
                'status_id' => '2',
                'is_emergency' => '1',
            ],
            [
                'month_id' => '6',
                'pss_case_id' => '1',
                'status_id' => '2',
                'is_emergency' => '0',
            ],
            [
                'month_id' => '7',
                'pss_case_id' => '1',
                'status_id' => '2',
                'is_emergency' => '0',
            ],
        ];

        foreach($data as $n)
        {
            Record::create($n);
        }
    }
}
