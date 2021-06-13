<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeneficiaryType;

class BeneficiaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Direct',
            'Indirect',
        ];
        
        foreach ($data as $n) {
            BeneficiaryType::create(['name' => $n]);
        }
    }
}
