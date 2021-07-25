<?php

namespace Database\Seeders;

use App\Http\Controllers\JobTitle;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //User::factory()->times(10)->create();
        
        $users = [
            [
                'name' => 'Mohamed Fathy',
                'email' => 'mohammedfathy@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PROGRAM_OFFICER_ID,
                'department_id' => Department::Management_ID,
                'team_id' => '4',
                'budget_id' => '2',
    
            ],
            [
                'name' => 'Maha Osman',
                'email' => 'mahahussaien@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PS_WORKER_ID,
                'department_id' => Department::PSS_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],
            [
                'name' => 'Ahmed Alrajeh',
                'email' => 'ahmedalrajeh@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PS_WORKER_ID,
                'department_id' => Department::PSS_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],
            [
                'name' => 'Mohamed Maher',
                'email' => 'mahershweiki@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::HOUSING_ADVOCATE_ID,
                'department_id' => Department::HOUSING_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],
            [
                'name' => 'Gihan Babiker',
                'email' => 'gihanbabiker@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PROGRAM_MANAGER_ID,
                'department_id' => Department::Management_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],
            [
                'name' => 'Nourhanne Hetta',
                'email' => 'nourhannehetta@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PROGRAM_OFFICER_ID,
                'department_id' => Department::Management_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],
            [
                'name' => 'Yara Negm',
                'email' => 'yaranegm@pstic-egypt.org',
                'password' => Hash::make('pstic12345'),
                //'Status' => 'Active'
                'job_title_id' => JobTitle::PROGRAM_OFFICER_ID,
                'department_id' => Department::Management_ID,
                'team_id' => '1',
                'budget_id' => '2',
            ],

        ];
        DB::table('users')->insert($users);

        $ahmedAlrajeh = User::where('name', 'Ahmed Alrajeh')->first();
        $ahmedAlrajeh->assignRole('PSW');

        $gihan = User::where('name', 'Gihan Babiker')->first();
        $gihan->assignRole('Administrator');
        $gihan->assignRole('PS Supervisor');

        $nourhanne = User::where('name', 'Nourhanne Hetta')->first();
        $nourhanne->assignRole('Administrator');
        $nourhanne->assignRole('PS Supervisor');
        
        $yara = User::where('name', 'Yara Negm')->first();
        $yara->assignRole('Administrator');
        $yara->assignRole('PS Supervisor');
        
    }
}


