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
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        foreach ($data as $n) {
            Month::create(['name' => $n]);
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
