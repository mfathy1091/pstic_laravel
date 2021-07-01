<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reason;

class ReasonSeeder extends Seeder
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
            'MH',
        ];

        foreach($data as $n){
            Reason::create(['name' => $n]);
        }
    }
}
