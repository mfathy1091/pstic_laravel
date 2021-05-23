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
                'referral_date' => '19-02-2021',
                'file_number' => '914-20C0001',
                'referral_source_id' => '1',
                'referring_person_name' => 'Farah',
                'referring_person_email' => 'farah@gmail.com',
                'case_type_id' => '2',
                'case_status_id' => '2',
                'is_emergency' => 'yes',
                'ps_worker_id' => '1',
            ],
            [
                'referral_date' => '13-03-2021',
                'file_number' => '914-20C0002',
                'referral_source_id' => '2',
                'referring_person_name' => 'Omnia',
                'referring_person_email' => 'omnia@gmail.com',
                'case_type_id' => '2',
                'case_status_id' => '2',
                'is_emergency' => '',
                'ps_worker_id' => '2',
            ],
            [
                'referral_date' => '15-05-2021',
                'file_number' => '914-20C0003',
                'referral_source_id' => '3',
                'referring_person_name' => 'Yasmeen',
                'referring_person_email' => 'yasmeen@gmail.com',
                'case_type_id' => '1',
                'case_status_id' => '1',
                'is_emergency' => '',
                'ps_worker_id' => '2',
            ],
        ];


        DB::table('ps_cases')->insert($data);
                
    }
}
