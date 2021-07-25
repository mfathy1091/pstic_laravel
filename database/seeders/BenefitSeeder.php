<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;
use App\Models\BenefitBeneficiary;


class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefits = [
            [
                'beneficiary_id' => '1',
                'pss_case_id' => '1',
                'service_id' => '1',
                'record_id' => '1',
                'provide_date' => '20-06-2021',
            ],
            [
                'beneficiary_id' => '1',
                'pss_case_id' => '1',
                'service_id' => '2',
                'record_id' => '1',
                'provide_date' => '15-06-2021',
            ],
            [
                'beneficiary_id' => '1',
                'pss_case_id' => '1',
                'service_id' => '3',
                'record_id' => '1',
                'provide_date' => '9-06-2021',
            ],


            [
                'beneficiary_id' => '1',
                'pss_case_id' => '1',
                'service_id' => '1',
                'record_id' => '2',
                'provide_date' => '9-07-2021',
            ],
            [
                'beneficiary_id' => '1',
                'pss_case_id' => '1',
                'service_id' => '2',
                'record_id' => '2',
                'provide_date' => '15-07-2021',
            ],

        ];

        foreach($benefits as $n)
        {
            Benefit::create($n);
        }




        $benefitsBeneficiaries = [
            [
                'benefit_id' => '1',
                'beneficiary_id' => '1',
            ],
            [
                'benefit_id' => '1',
                'beneficiary_id' => '2',
            ],
            [
                'benefit_id' => '2',
                'beneficiary_id' => '1',
            ],
            [
                'benefit_id' => '2',
                'beneficiary_id' => '2',
            ],
            [
                'benefit_id' => '3',
                'beneficiary_id' => '2',
            ],


            [
                'benefit_id' => '4',
                'beneficiary_id' => '1',
            ],
            [
                'benefit_id' => '4',
                'beneficiary_id' => '2',
            ],
            [
                'benefit_id' => '5',
                'beneficiary_id' => '2',
            ],
            [
                'benefit_id' => '5',
                'beneficiary_id' => '1',
            ],
            [
                'benefit_id' => '5',
                'beneficiary_id' => '2',
            ],
        ];

        foreach($benefitsBeneficiaries as $n)
        {
            BenefitBeneficiary::create($n);
        }


        
    }
}
