<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vulnerability;
use Illuminate\Support\Facades\DB;


class VulnerabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vulnerabilities')->delete();
        
        $vulnerabilities = ['Protection', 'CP' ,'CBP', 'GBV', 'Physical Assault', 'MH'];

        foreach ($vulnerabilities as $n) {
            Vulnerability::create(['name' => $n]);
        }
    }
}
