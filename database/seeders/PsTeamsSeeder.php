<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PsTeam;
use Illuminate\Support\Facades\DB;

class PsTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ps_teams')->delete();
        $psTeams = ['NC', 'Eatmad', 'Emad', 'Morgos', 'Nyouk', 'Alan', 'Zelal'];

        foreach ($psTeams as $n) {
            PsTeam::create(['name' => $n]);
        }
    }
}
