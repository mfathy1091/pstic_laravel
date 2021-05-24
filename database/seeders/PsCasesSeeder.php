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
                'file_number' => '555-19C12726',
                'referral_source_id' => '1',
                'referring_person_name' => 'Ghada Abdullah',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
                'case_type_id' => '2',
                'case_status_id' => '4',
                'is_emergency' => 'yes',
                'ps_worker_id' => '1',
            ],
            [
                'referral_date' => '13-03-2021',
                'file_number' => '555-19C06345',
                'referral_source_id' => '5',
                'referring_person_name' => 'Christina Philip',
                'referring_person_email' => 'Christina.philip@caritasalex.org',
                'case_type_id' => '2',
                'case_status_id' => '1',
                'is_emergency' => '',
                'ps_worker_id' => '2',
            ],
            [
                'referral_date' => '15-05-2021',
                'file_number' => '555-19C07914',
                'referral_source_id' => '1',
                'referring_person_name' => 'Dalia Elsady',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
                'case_type_id' => '1',
                'case_status_id' => '1',
                'is_emergency' => 'yes',
                'ps_worker_id' => '2',
            ],
            [
                'referral_date' => '15-05-2021',
                'file_number' => '555-14C04384',
                'referral_source_id' => '2',
                'referring_person_name' => 'Samira',
                'referring_person_email' => 'semira.suliman@savethechildren.org',
                'case_type_id' => '1',
                'case_status_id' => '1',
                'is_emergency' => 'yes',
                'ps_worker_id' => '2',
            ],
            [
                'referral_date' => '15-05-2021',
                'file_number' => '555-19C09225',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'case_status_id' => '1',
                'is_emergency' => '',
                'ps_worker_id' => '2',
            ],
            [
                'referral_date' => '13-04-2021',
                'file_number' => '555-21C00007',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'case_status_id' => '2',
                'is_emergency' => '',
                'ps_worker_id' => '2',
            ],
        ];


        DB::table('ps_cases')->insert($data);
                
    }
}
