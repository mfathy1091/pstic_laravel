<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'Psychosocial',
            'Housing'
        ];
        foreach ($sections as $n) {
            Section::create(['name' => $n]);
        }
        
    }
}
