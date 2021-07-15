<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Budget;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'UNHCR Cairo',
            'UNHCR NC',
            'BPRM',
            'SDC',
            'N/A',
        ];
        
        foreach ($data as $n) {
            Budget::create(['name' => $n]);
        }
    }
}
