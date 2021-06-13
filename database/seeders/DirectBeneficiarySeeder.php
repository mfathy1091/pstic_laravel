<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DirectBeneficiary;

class DirectBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direct_beneficiaries')->delete();

        $data = [
            [
                'name' => 'Ibrahim Mohamed',
                'age' => '17',
                'gender_id' => '1',
                'nationality_id' => '2',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Mohammad Mhd Nazir Kamel',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '3',
                'ps_case_id' => '2',
            ],
            [
                'name' => 'Fatma Musa',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '4',
                'ps_case_id' => '3',
            ],
            [
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '1',
                'ps_case_id' => '4',
            ],
            [
                'name' => 'Abaker Azraa Haloof ',
                'age' => '5',
                'gender_id' => '1',
                'nationality_id' => '3',
                'ps_case_id' => '5',
            ],
            [
                'name' => 'KHADRA ALI MOHAMED ',
                'age' => '15',
                'gender_id' => '2',
                'nationality_id' => '4',
                'ps_case_id' => '6',
            ],

        ];

        //DB::table('direct_beneficiaries')->insert($data);
    }
    
}
