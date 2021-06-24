<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referral;
use App\Models\PssCase;
use App\Models\ReferralBeneficiary;

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


        // (2) Referral Beneficiaries
        $referral_beneficiaries = [
            [
                'referral_id' => '1',
                'beneficiary_id' => '1',
            ],
            [
                'referral_id' => '1',
                'beneficiary_id' => '2',
            ],
        ];

        foreach ($referral_beneficiaries as $n) {
            ReferralBeneficiary::create($n);
        }



        // (3) Referral Sections
        $pssCases = [
            [   'file_id' => '1',
                'referral_id' => '1',
                'direct_beneficiary_id' => '1',
                'assigned_psw_id' => '3',
                'current_pss_status_id' => '2',
            ],
            [   'file_id' => '1',
                'referral_id' => '2',
                'direct_beneficiary_id' => '2',
                'assigned_psw_id' => '3',
                'current_pss_status_id' => '1',
            ],
        ];


        foreach ($pssCases as $n) {
            PssCase::create($n);
        }




    }
}
