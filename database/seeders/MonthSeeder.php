<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Month;
use App\Models\MonthReferral;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('months')->delete();
        $data = [
            [
                'code' => '01-2021',
                'name' => 'January 2021',
            ],
            [
                'code' => '02-2021',
                'name' => 'February 2021',
            ],
            [
                'code' => '03-2021',
                'name' => 'March 2021',
            ],
            [
                'code' => '04-2021',
                'name' => 'April 2021',
            ],
            [
                'code' => '05-2021',
                'name' => 'May 2021',
            ],
            [
                'code' => '06-2021',
                'name' => 'June 2021',
            ],
            [
                'code' => '07-2021',
                'name' => 'July 2021',
            ],
            [
                'code' => '08-2021',
                'name' => 'August 2021',
            ],
            [
                'code' => '09-2021',
                'name' => 'September 2021',
            ],
            [
                'code' => '10-2021',
                'name' => 'October 2021',
            ],
            [
                'code' => '11-2021',
                'name' => 'November 2021',
            ],
            [
                'code' => '12-2021',
                'name' => 'December 2021',
            ],
        ];

        foreach ($data as $n) {
            Month::create($n);
        }


        DB::table('month_referral')->delete();
        $data2 = [
            [
                'month_id' => '4',
                'referral_id' => '1',
                'case_status' => 'New'
            ],
            [
                'month_id' => '5',
                'referral_id' => '1',
                'case_status' => 'Ongoing'
            ],
            [
                'month_id' => '6',
                'referral_id' => '1',
                'case_status' => 'Ongoing'
            ],


            [
                'month_id' => '5',
                'referral_id' => '2',
                'case_status' => 'New'
            ],
            [
                'month_id' => '6',
                'referral_id' => '1',
                'case_status' => 'Ongoing'
            ],


            [
                'month_id' => '6',
                'referral_id' => '3',
                'case_status' => 'New'
            ],
        ];

        foreach ($data2 as $n) {
            MonthReferral::create($n);
        }
    }
}
