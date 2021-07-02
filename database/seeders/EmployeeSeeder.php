<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Mohamed Fathy',
                'job_title_id' => '4',
                'department_id' => '3',
                'team_id' => '4',
                'budget_id' => '2',
                'hire_date' => '2016-02-01',
                'age' => '29',
                'gender_id' => '1',
                'nationality_id' => '1',
                'user_id' => '1',
            ],
            [
                'name' => 'Maha Osman',
                'job_title_id' => '1',
                'department_id' => '3',
                'team_id' => '1',
                'budget_id' => '2',
                'hire_date' => '2018-08-01',
                'age' => '38',
                'gender_id' => '2',
                'nationality_id' => '3',
                'user_id' => '2',
            ],
            [
                'name' => 'Ahmed Alrajeh',
                'job_title_id' => '1',
                'department_id' => '1',
                'team_id' => '1',
                'budget_id' => '2',
                'hire_date' => '2013-05-01',
                'age' => '34',
                'gender_id' => '1',
                'nationality_id' => '2',
                'user_id' => '3',
            ],
            [
                'name' => 'Mohamed Maher',
                'job_title_id' => '2',
                'department_id' => '2',
                'team_id' => '1',
                'budget_id' => '2',
                'hire_date' => '2013-05-01',
                'age' => '40',
                'gender_id' => '1',
                'nationality_id' => '2',
                'user_id' => '4',
            ]
        ];

        foreach ($data as $n) {
            Employee::create($n);
        }

        //DB::table('employees')->insert($data);



    }
}
