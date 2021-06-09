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
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersSeeder::class);

        $this->call(NationalitySeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(PsTeamsSeeder::class);

        $this->call(JobTitleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(BudgetSeeder::class);
        $this->call(EmployeeSeeder::class);

        $this->call(IdentityCardsSeeder::class);
        $this->call(ReferralSourcesSeeder::class);
        $this->call(CaseStatusesSeeder::class);
        $this->call(CaseTypesSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(MonthsSeeder::class);
        $this->call(VisitsSeeder::class);
        $this->call(VulnerabilitiesSeeder::class);
        $this->call(PsCasesSeeder::class);
        $this->call(DirectBeneficiariesSeeder::class);
        $this->call(SurveysTableSeeder::class);
        $this->call(PsCaseActivitiesSeeder::class);



        //$this->call(GroupSeeder::class);
        //$this->call(GroupUserSeeder::class);
        //$this->call(PsWorkersSeeder::class);


    }
}
