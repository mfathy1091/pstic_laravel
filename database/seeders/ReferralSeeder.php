<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referral;
use App\Models\PssCase;
use App\Models\Beneficiary;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // (1) Referrals
        $referrals = [
            [    
                'file_id' => '1',
                'referral_source_id' => '1',
                'referral_date' => '19-02-2021',
                'referring_person_name' => 'Ghada Abdullah',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
                'created_user_id' => '1',
            ],
            [
                'file_id' => '1',
                'referral_source_id' => '5',
                'referral_date' => '13-06-2021',
                'referring_person_name' => 'Christina Philip',
                'referring_person_email' => 'Christina.philip@caritasalex.org',
                'created_user_id' => '1',
            ],
            [
                'file_id' => '1',
                'referral_source_id' => '2',
                'referral_date' => '15-06-2021',
                'referring_person_name' => 'Samira',
                'referring_person_email' => 'semira.suliman@savethechildren.org',
                'created_user_id' => '1',
            ],

        ];

        foreach ($referrals as $n) {
            Referral::create($n);
        }


        // (2) PSS Cases
        $pssCases = [
            [   'referral_id' => '1',
                'current_case_status_id' => '2',
                'assigned_psw_id' => '3',
            ],
            [   'referral_id' => '2',
                'current_case_status_id' => '1',
                'assigned_psw_id' => '3',
            ],
            [
                'referral_id' => '3',
                'current_case_status_id' => '1',
                'assigned_psw_id' => '3',
            ],
        ];

        foreach ($pssCases as $n) {
            PssCase::create($n);
        }


        // Beneficiaries
        $beneficiaries = [
            [
                'pss_case_id' => '1',
                'name' => 'Ibrahim Mohamed',
                'age' => '50',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
            ],
            [
                'pss_case_id' => '1',
                'name' => 'Maszen Ibrahim',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '1',
                'name' => 'Fatma Ibrahim',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '1',
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],



            [
                'pss_case_id' => '2',
                'name' => 'Ibrahim Mohamed',
                'age' => '50',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '2',
                'name' => 'Maszen Ibrahim',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
            ],
            [
                'pss_case_id' => '2',
                'name' => 'Fatma Ibrahim',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '2',
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],  



            [
                'pss_case_id' => '3',
                'name' => 'Ibrahim Mohamed',
                'age' => '50',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '3',
                'name' => 'Maszen Ibrahim',
                'age' => '33',
                'gender_id' => '1',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '3',
                'name' => 'Fatma Ibrahim',
                'age' => '16',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '2',
            ],
            [
                'pss_case_id' => '3',
                'name' => 'Amany Ali AL Karar',
                'age' => '41',
                'gender_id' => '2',
                'nationality_id' => '2',
                'beneficiary_type_id' => '1',
            ],  



        ];


        foreach ($beneficiaries as $n) {
            Beneficiary::create($n);
        }

    
    }
}
