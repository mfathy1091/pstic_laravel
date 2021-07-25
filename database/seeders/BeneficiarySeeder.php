<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beneficiary;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // (3) Beneficiaries
        $beneficiaries = [
            [
                'pss_case_id' => '1',
                'individual_id' => '1',
                'is_direct' => '1',
            ],
            [
                'pss_case_id' => '1',
                'individual_id' => '2',
                'is_direct' => '0',
            ],

            [
                'pss_case_id' => '2',
                'individual_id' => '1',
                'is_direct' => '1',
            ],
            [
                'pss_case_id' => '2',
                'individual_id' => '2',
                'is_direct' => '0',
            ],

            [
                'pss_case_id' => '3',
                'individual_id' => '2',//4
                'is_direct' => '0',
            ],
            [
                'pss_case_id' => '3',
                'individual_id' => '2',//5
                'is_direct' => '0',
            ],
            [
                'pss_case_id' => '3',
                'individual_id' => '2',//6
                'is_direct' => '1',
            ],
        ];

        foreach ($beneficiaries as $n) {
            Beneficiary::create($n);
        }
    }
}
