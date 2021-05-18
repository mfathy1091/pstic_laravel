<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ps_cases')->delete();

        $data = [
            [    
                'file_number' => '914-20C0001',
                'referral_date' => '19-02-2021',
                'direct_beneficiary_name' => 'Amira Abdellatief',
                'referral_source_id' => '1',
                'ps_worker_id' => '1',
                'is_emergency' => 'yes',
            ],
            [
                'file_number' => '914-20C0002',
                'referral_date' => '13-03-2021',
                'direct_beneficiary_name' => 'Mostafa Abdelatief',
                'referral_source_id' => '2',
                'ps_worker_id' => '2',
                'is_emergency' => '',
            ],
            [
                'file_number' => '914-20C0003',
                'referral_date' => '25-05-2021',
                'direct_beneficiary_name' => 'Elsadig',
                'referral_source_id' => '3',
                'ps_worker_id' => '2',
                'is_emergency' => '',
            ],
        ];


        DB::table('ps_cases')->insert($data);
                
    }
}