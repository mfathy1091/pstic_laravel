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
        $this->call(StatusSeeder::class);

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);

        $this->call(NationalitySeeder::class);
        $this->call(GenderSeeder::class);

        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TeamSeeder::class);

        $this->call(JobTitleSeeder::class);
        $this->call(BudgetSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(SectionSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(ReferralSourceSeeder::class);
        $this->call(ReferralSeeder::class);




        $this->call(MonthSeeder::class);
        $this->call(RecordSeeder::class);
        $this->call(BeneficiarySeeder::class);

        $this->call(IdentityCardsSeeder::class);
        $this->call(CaseTypeSeeder::class);
        $this->call(VulnerabilitySeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(VisitSeeder::class);
        $this->call(BenefitSeeder::class);

        

    }
}
