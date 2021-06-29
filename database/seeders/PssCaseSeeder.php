<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Beneficiary;

class PsCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pss_cases')->delete();
        
        $data = [
            [    
                'referral_date' => '19-02-2021',
                'file_number' => '555-19C12726',
                'referral_source_id' => '1',
                'referring_person_name' => 'Ghada Abdullah',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
                'case_type_id' => '2',
                'pss_status_id' => '4',
                'is_emergency' => 'yes',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '13-06-2021',
                'file_number' => '555-19C06345',
                'referral_source_id' => '5',
                'referring_person_name' => 'Christina Philip',
                'referring_person_email' => 'Christina.philip@caritasalex.org',
                'case_type_id' => '2',
                'pss_status_id' => '1',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-19C07914',
                'referral_source_id' => '1',
                'referring_person_name' => 'Dalia Elsady',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => 'yes',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-14C04384',
                'referral_source_id' => '2',
                'referring_person_name' => 'Samira',
                'referring_person_email' => 'semira.suliman@savethechildren.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => 'yes',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-19C09225',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '13-04-2021',
                'file_number' => '555-21C00007',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'pss_status_id' => '2',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            
            
            
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-14C04384',
                'referral_source_id' => '2',
                'referring_person_name' => 'Samira',
                'referring_person_email' => 'semira.suliman@savethechildren.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => 'yes',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-19C09225',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '13-04-2021',
                'file_number' => '555-21C00007',
                'referral_source_id' => '5',
                'referring_person_name' => 'Maram Salah',
                'referring_person_email' => 'maramsalah@caritaseg-ref.org',
                'case_type_id' => '1',
                'pss_status_id' => '2',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '3',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-17C12720',
                'referral_source_id' => '1',
                'referring_person_name' => 'Abdallah Bahar',
                'referring_person_email' => 'abdallah@msf.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => 'yes',
                'created_user_id' => '1',
                'assigned_employee_id' => '2',
            ],
            [
                'referral_date' => '15-06-2021',
                'file_number' => '555-18C10215',
                'referral_source_id' => '2',
                'referring_person_name' => 'Amina Ashraf',
                'referring_person_email' => 'amina@savethechildren.org',
                'case_type_id' => '1',
                'pss_status_id' => '1',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '2',
            ],
            [
                'referral_date' => '13-03-2021',
                'file_number' => '555-18C02423',
                'referral_source_id' => '2',
                'referring_person_name' => ' Fatima Nosseir',
                'referring_person_email' => 'fatima@csavethechildren.org',
                'case_type_id' => '1',
                'pss_status_id' => '2',
                'is_emergency' => '',
                'created_user_id' => '1',
                'assigned_employee_id' => '2',
            ],

        ];

        DB::table('ps_cases')->insert($data);





        DB::table('beneficiaries')->delete();

        $beneficiaries = [
            [
                'name' => 'Ibrahim Mohamed',
                'age' => '17',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Mohammad Mhd Nazir Kamel',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '3',
                'beneficiary_type_id' => '2',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Fatma Musa',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '2',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
                'ps_case_id' => '1',
            ],
            [
                'name' => 'Ibrahim Mohamed',
                'age' => '17',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '2',
            ],
            [
                'name' => 'Mohammad Mhd Nazir Kamel',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '3',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '3',
            ],
            [
                'name' => 'Fatma Musa',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '4',
            ],
            [
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '5',
            ],
            [
                'name' => 'Abaker Azraa Haloof ',
                'age' => '5',
                'gender_id' => '1',
                'nationality_id' => '3',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '6',
            ],
            [
                'name' => 'KHADRA ALI MOHAMED ',
                'age' => '15',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '7',
            ],
            [
                'name' => 'Abaker Azraa Haloof ',
                'age' => '5',
                'gender_id' => '1',
                'nationality_id' => '3',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '8',
            ],
            [
                'name' => 'KHADRA ALI MOHAMED ',
                'age' => '15',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '9',
            ],
            [
                'name' => 'KHADRA ALI MOHAMED ',
                'age' => '15',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '10',
            ],
            [
                'name' => 'Abaker Azraa Haloof ',
                'age' => '5',
                'gender_id' => '1',
                'nationality_id' => '3',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '11',
            ],
            [
                'name' => 'KHADRA ALI MOHAMED ',
                'age' => '15',
                'gender_id' => '2',
                'nationality_id' => '4',
                'beneficiary_type_id' => '1',
                'ps_case_id' => '12',
            ],
        ];


        foreach ($beneficiaries as $n) {
            Beneficiary::create($n);
        }
                
    }

}