<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(IdentityCardsSeeder::class);
        $this->call(ReferralSourcesSeeder::class);
        $this->call(CaseStatusesSeeder::class);
        $this->call(CaseTypesSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(ReferralsSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(PsTeamsSeeder::class);
        $this->call(PsWorkersSeeder::class);
        $this->call(MonthsSeeder::class);

    }
}
