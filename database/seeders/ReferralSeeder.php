<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referral;
use App\Models\PssCase;
use App\Models\Beneficiary;
use App\Models\ReferralReason;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Referrals
        $referrals = [
            [    
                'direct_individual_id' => '1',
                'referral_source_id' => '1',
                'referral_date' => '19-03-2021',
                'referring_person_name' => 'Ghada Abdullah',
                'referring_person_email' => 'MSF-Maadi-SocialWorker@brussels.msf.org',
            ],
            [
                'direct_individual_id' => '1',
                'referral_source_id' => '5',
                'referral_date' => '02-07-2021',
                'referring_person_name' => 'Christina Philip',
                'referring_person_email' => 'Christina.philip@caritasalex.org',
            ],
            [
                'direct_individual_id' => '2',
                'referral_source_id' => '2',
                'referral_date' => '01-07-2021',
                'referring_person_name' => 'Samira',
                'referring_person_email' => 'semira.suliman@savethechildren.org',
            ],

        ];

        foreach ($referrals as $n) {
            Referral::create($n);
        }



        // Reasons
        $referralReasons = [
            [
                'referral_id' => '1',
                'reason_id' => '1',
            ],
            [
                'referral_id' => '1',
                'reason_id' => '2',
            ],
            [
                'referral_id' => '1',
                'reason_id' => '3',
            ],

        ];

        foreach($referralReasons as $n){
            ReferralReason::create($n);
        }
        


        // PSS Cases
        $pssCases = [
            [   
                'file_id' => '1',
                'direct_individual_id' => '1',
                'referral_id' => '1',
                'assigned_psw_id' => '4',
                'current_status_id' => '2',
            ],
            [   
                'file_id' => '1',
                'direct_individual_id' => '2',
                'referral_id' => '2',
                'assigned_psw_id' => '4',
                'current_status_id' => '1',
            ],

        
            [   
                'file_id' => '1',
                'direct_individual_id' => '2',
                'referral_id' => '3',
                'assigned_psw_id' => '3',
                'current_status_id' => '1',
            ],

        ];


        foreach ($pssCases as $n) {
            PssCase::create($n);
        }




    }
}
