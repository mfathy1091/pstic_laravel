<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referral;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
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

        foreach ($data as $n) {
            Referral::create($n);
        }
    
    }
}
