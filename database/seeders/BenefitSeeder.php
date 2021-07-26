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
                'service_id' => '1',
            ],
            [
                'beneficiary_id' => '1',
                'service_id' => '2',
            ],
            [
                'beneficiary_id' => '1',
                'service_id' => '3',
            ],


            [
                'beneficiary_id' => '2',
                'service_id' => '1',
            ],
            [
                'beneficiary_id' => '2',
                'service_id' => '2',
            ],

        ];

        foreach($benefits as $n)
        {
            Benefit::create($n);
        }

        
    }
}
