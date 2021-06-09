<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nationality;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();
        $nationalities = ['Egypt', 'Syria', 'Sudan', 'Eritrea', 'Yemen', 'S. Sudan', 'Somalia'];

        foreach ($nationalities as $n) {
            Nationality::create(['name' => $n]);
        }

    }
}
