<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();
        $statuses = [
            [
                'name' => 'New',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Ongoing',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Closed',
                'type' => 'Psychosocial',
            ],
            [
                'name' => 'Inactive',
                'type' => 'Psychosocial',
            ],
        ];

        foreach ($statuses as $n) {
            Status::create($n);
        }
    }
}
