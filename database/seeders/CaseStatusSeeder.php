<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CaseStatus;

class CaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('case_statuses')->delete();
        $caseStatuses = ['New', 'Ongoing', 'Closed', 'Inactive'];

        foreach ($caseStatuses as $n) {
            CaseStatus::create(['name' => $n]);
        }
    }
}
