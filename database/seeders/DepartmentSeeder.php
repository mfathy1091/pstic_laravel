<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'PSS',
            'Housing',
            'Management',
            'N/A',
        ];

        
        foreach ($data as $n) {
            Department::create(['name' => $n]);
        }
    }
}
