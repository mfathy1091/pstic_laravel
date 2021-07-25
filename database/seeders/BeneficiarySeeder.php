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
                'record_id' => '1',
                'pss_case_id' => '1',
                'individual_id' => '1',
                'month_id' => '6',
                'is_direct' => '1',
                
            ],
            [
                'record_id' => '1',
                'pss_case_id' => '1',
                'individual_id' => '2',
                'month_id' => '6',
                'is_direct' => '0',
            ],

            [
                'record_id' => '2',
                'pss_case_id' => '1',
                'individual_id' => '1',
                'is_direct' => '1',
                'month_id' => '7',
            ],
            
        ];

        foreach ($beneficiaries as $n) {
            Beneficiary::create($n);
        }
    }
}
