<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
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
            'Counseling - Problem Solving',
            'Info Sharing',
            'Community Support',
            'Basic Needs',
            'Protection - Security',
            'Recreation',
            'Health Care',
            'MH Care',
            'Housing Advocay',
            'Health Advocay'
        ];

        foreach ($data as $n){
            Service::create(['name' => $n]);
        }
    }
}
