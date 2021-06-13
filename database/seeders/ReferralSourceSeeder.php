<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReferralSource;
use Illuminate\Support\Facades\DB;

class ReferralSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referral_sources')->delete();
        
        $referralSources = ['MSF', 'SCI', 'IOM', 'Care', 'Caritas'];

        foreach ($referralSources as $referralSource) {
            ReferralSource::create(['name' => $referralSource]);
        }

    }
}
