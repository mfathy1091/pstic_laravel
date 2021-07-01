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
        $this->call(ReasonSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PssStatusSeeder::class);

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(NationalitySeeder::class);
        $this->call(GenderSeeder::class);

        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TeamSeeder::class);

        $this->call(JobTitleSeeder::class);
        $this->call(BudgetSeeder::class);
        $this->call(EmployeeSeeder::class);

        $this->call(SectionSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(BeneficiaryTypeSeeder::class);
        $this->call(ReferralSourceSeeder::class);
        $this->call(ReferralSeeder::class);






        $this->call(BeneficiarySeeder::class);

        $this->call(IdentityCardsSeeder::class);
        $this->call(CaseTypeSeeder::class);
        $this->call(MonthSeeder::class);
        $this->call(VulnerabilitySeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(MonthlyRecordSeeder::class);
        $this->call(VisitSeeder::class);

    }
}
