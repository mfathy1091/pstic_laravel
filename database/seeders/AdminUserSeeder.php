<?php

namespace Database\Seeders;

use App\Http\Controllers\JobTitle;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $data = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('pstic12345'),
            //'Status' => 'Active'
            'job_title_id' => JobTitle::NA_ID,
            'department_id' => Department::NA_ID,
            'team_id' => '10',
            'budget_id' => '5',
        ];
        $admin = User::create($data);
        
        $admin->assignRole('Administrator');
        $admin->assignRole('PS Supervisor');
        $admin->assignRole('PSW');
        
    }
}


