<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PssStatus;

class PssStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pss_statuses')->delete();
        $caseStatuses = ['New', 'Ongoing', 'Closed', 'Inactive'];

        foreach ($caseStatuses as $n) {
            PssStatus::create(['name' => $n]);
        }
    }
}
