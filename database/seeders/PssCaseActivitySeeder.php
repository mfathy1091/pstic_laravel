<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PssCaseActivity;


class PssCaseActivitySeeder extends Seeder
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
                'month_id' => '2',
                'pss_status_id' => '1',
                'pss_case_id' => '1',
            ],
            [
                'month_id' => '3',
                'pss_status_id' => '2',
                'pss_case_id' => '1',
            ],
            [
                'month_id' => '4',
                'pss_status_id' => '2',
                'pss_case_id' => '1',
            ],
            [
                'month_id' => '5',
                'pss_status_id' => '2',
                'pss_case_id' => '1',
            ],
            [
                'month_id' => '6',
                'pss_status_id' => '2',
                'pss_case_id' => '1',
            ],
        ];

        foreach($data as $n)
        {
            PssCaseActivity::create($n);
        }
    }
}
