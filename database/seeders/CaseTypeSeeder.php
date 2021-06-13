<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CaseType;

class CaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('case_types')->delete();
        $caseTypes = ['Family', 'Individual', 'SGBV'];

        foreach ($caseTypes as $n) {
            CaseType::create(['name' => $n]);
        }
    
    }
}
