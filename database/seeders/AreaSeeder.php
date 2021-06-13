<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();

        
        $data = [
            [    
                'name' => '6th of October',
                'city_id' => '1',
            ],
            [    
                'name' => 'Faisal',
                'city_id' => '1',
            ],
            [    
                'name' => 'Maadi',
                'city_id' => '1',
            ],
            [    
                'name' => 'Ain Shams',
                'city_id' => '1',
            ],
            [    
                'name' => 'Ardilliwa',
                'city_id' => '1',
            ],
            [    
                'name' => '10th of Ramadan',
                'city_id' => '1',
            ],
            [    
                'name' => 'Marag',
                'city_id' => '1',
            ],
            [    
                'name' => 'Mohandseen',
                'city_id' => '1',
            ],
            [    
                'name' => 'Dar El-Salam',
                'city_id' => '1',
            ],
            [    
                'name' => 'Nasr City',
                'city_id' => '1',
            ],
            [    
                'name' => 'Masaken Othman',
                'city_id' => '1',
            ],
            [    
                'name' => 'Badr City',
                'city_id' => '1',
            ],
            [    
                'name' => 'Matarya',
                'city_id' => '1',
            ],
            [    
                'name' => 'Masr Elgdida',
                'city_id' => '1',
            ],
            [    
                'name' => 'Kilo 4.5',
                'city_id' => '1',
            ],
            [    
                'name' => 'Shoubra',
                'city_id' => '1',
            ],
            [    
                'name' => 'Damietta',
                'city_id' => '3',
            ],
            [    
                'name' => 'Alexandria',
                'city_id' => '2',
            ],
            

        ];


        DB::table('areas')->insert($data);
    }
}
