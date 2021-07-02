<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRecord;
use App\Models\ServiceRecordBeneficiary;


class ServiceRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceRecords = [
            [
                'pss_case_id' => '1',
                'service_id' => '1',
                'monthly_record_id' => '1',
            ],
            [
                'pss_case_id' => '1',
                'service_id' => '2',
                'monthly_record_id' => '1',
            ],
            [
                'pss_case_id' => '1',
                'service_id' => '3',
                'monthly_record_id' => '1',
            ],


            [
                'pss_case_id' => '1',
                'service_id' => '1',
                'monthly_record_id' => '5',
            ],
            [
                'pss_case_id' => '1',
                'service_id' => '2',
                'monthly_record_id' => '5',
            ],
            [
                'pss_case_id' => '1',
                'service_id' => '3',
                'monthly_record_id' => '5',
            ],
        ];

        foreach($serviceRecords as $n)
        {
            ServiceRecord::create($n);
        }




        $serviceRecordsBeneficiaries = [
            [
                'service_record_id' => '1',
                'individual_id' => '1',
            ],
            [
                'service_record_id' => '1',
                'individual_id' => '2',
            ],
            [
                'service_record_id' => '2',
                'individual_id' => '1',
            ],
            [
                'service_record_id' => '2',
                'individual_id' => '2',
            ],
            [
                'service_record_id' => '3',
                'individual_id' => '2',
            ],


            [
                'service_record_id' => '4',
                'individual_id' => '1',
            ],
            [
                'service_record_id' => '4',
                'individual_id' => '2',
            ],
            [
                'service_record_id' => '5',
                'individual_id' => '2',
            ],
            [
                'service_record_id' => '6',
                'individual_id' => '1',
            ],
            [
                'service_record_id' => '6',
                'individual_id' => '2',
            ],
        ];

        foreach($serviceRecordsBeneficiaries as $n)
        {
            ServiceRecordBeneficiary::create($n);
        }


        
    }
}
