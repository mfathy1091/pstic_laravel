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
            [
                'name' => 'PSS',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Info Sharing',
                'type' => 'Counseling',
            ],
            [
                'name' => 'Basic Needs',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Community Support',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Housing Advocacy',
                'type' => 'Psychosocial',
            ],

        ];

        foreach ($data as $n){
            Service::create($n);
        }
    }
}
