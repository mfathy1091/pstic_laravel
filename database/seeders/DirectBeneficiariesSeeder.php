<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DirectBeneficiary;

class DirectBeneficiariesSeeder extends Seeder
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
                'name' => 'Amira Abdelatief',
                'age' => '34',
                'gender_id' => '2',
                'nationality_id' => '2',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Mariam Elsadig',
                'age' => '3',
                'gender_id' => '2',
                'nationality_id' => '2',
                'ps_case_id' => '2',
            ],
            [
                'name' => 'Elsadig Imam',
                'age' => '41',
                'gender_id' => '1',
                'nationality_id' => '2',
                'ps_case_id' => '3',
            ],

        ];

        DB::table('direct_beneficiaries')->insert($data);
    }
    
}
