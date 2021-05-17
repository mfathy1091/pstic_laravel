<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class ReferralsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referrals')->delete();

        $data = [
            [    
                'referral_date' => '19-02-2021',
                'direct_beneficiary_name' => 'Amira Abdellatief',
                'referral_source_id' => '1',
                'ps_worker_id' => '1',
                'is_emergency' => 'yes',
            ],
            [
                'referral_date' => '13-03-2021',
                'direct_beneficiary_name' => 'Mostafa Abdelatief',
                'referral_source_id' => '2',
                'ps_worker_id' => '2',
                'is_emergency' => '',
            ],
        ];


        DB::table('referrals')->insert($data);
                
    }
}
