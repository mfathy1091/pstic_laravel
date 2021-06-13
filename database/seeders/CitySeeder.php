<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = ['Cairo', 'Alexandria', 'New Damietta', 'Mansoura'];

        foreach ($cities as $n) {
            City::create(['name' => $n]);
        }
    }
}
