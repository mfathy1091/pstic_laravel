<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Relationship;
use App\Models\Individual;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $relationships = [
            'PA',
            'Wife',
            'Husband',
            'Son',
            'Daughter'
        ];
        foreach ($relationships as $n) {
            Relationship::create(['name' => $n]);
        }
        
        
        
        $files = [
            [
                'number' => '555-11C01264',
                'created_user_id' => '1',
            ],
            [
                'number' => '914-16C02867',
                'created_user_id' => '1',
            ],
            [
                'number' => '555-20C01750',
                'created_user_id' => '1',
            ],
            [
                'number' => '555-19C01310',
                'created_user_id' => '1',
            ],
            [
                'number' => '555-18C00400',
                'created_user_id' => '1',
            ],
        ];

        foreach ($files as $n) {
            File::create($n);
        }



        $individuals = [
            [
                'file_id' => '1',
                'individual_id' => '555-00112677',
                'name' => 'Mariam KONE',
                'native_name' => 'مريم كوني',
                'age' => '42',
                'gender_id' => '2',
                'nationality_id' => '3',
                'relationship_id' => '1',
                'current_phone_number' => '01006785305',
            ],
            [
                'file_id' => '1',
                'individual_id' => '555-00112682',
                'name' => 'Zaharaa DIABY',
                'native_name' => 'زهراء ديابي',
                'age' => '20',
                'gender_id' => '2',
                'nationality_id' => '3',
                'relationship_id' => '5',
                'current_phone_number' => '01006785305',
            ],            [
                'file_id' => '1',
                'individual_id' => '555-00112683',
                'name' => 'Kadidja DIABY',
                'native_name' => 'خديجة ديابي',
                'age' => '19',
                'gender_id' => '2',
                'nationality_id' => '3',
                'relationship_id' => '5',
                'current_phone_number' => '01006785305',
            ],




            [
                'file_id' => '2',
                'individual_id' => '914-00127057',
                'name' => 'Hussein Asaad YASIN',
                'native_name' => 'حسين اسعد ياسين',
                'age' => '26',
                'gender_id' => '1',
                'nationality_id' => '2',
                'relationship_id' => '1',
                'current_phone_number' => '01112067527',
            ],
            [
                'file_id' => '2',
                'individual_id' => '914-00127062',
                'name' => 'Reem Mahmoud DAMAMA ALLOULOU',
                'native_name' => 'ريم محمود ضمامة اللولو',
                'age' => '23',
                'gender_id' => '2',
                'nationality_id' => '2',
                'relationship_id' => '2',
                'current_phone_number' => '01112067527',
            ],            
            [
                'file_id' => '2',
                'individual_id' => '555-00112683',
                'name' => 'Mariam Hussien YASIN',
                'native_name' => 'مريم حسين ياسين',
                'age' => '4',
                'gender_id' => '2',
                'nationality_id' => '2',
                'relationship_id' => '5',
                'current_phone_number' => '01112067527',
            ],



            [
                'file_id' => '3',
                'individual_id' => '555-00270922',
                'name' => 'Anas Musa ABDI',
                'native_name' => 'انس موسى عبدي',
                'age' => '15',
                'gender_id' => '1',
                'nationality_id' => '7',
                'relationship_id' => '1',
                'current_phone_number' => '01154212163',
            ],



            [
                'file_id' => '4',
                'individual_id' => '555-00244422',
                'name' => 'Suleiman Mussa Yusuf Mohamed',
                'native_name' => 'سليمان يوسف محمد موسى',
                'age' => '30',
                'gender_id' => '1',
                'nationality_id' => '4',
                'relationship_id' => '1',
                'current_phone_number' => '01008817734',
            ],

            [
                'file_id' => '5',
                'individual_id' => '555-00219736',
                'name' => 'Asmaa Ahmed ALI',
                'native_name' => 'أسماء أحمد علي',
                'age' => '62',
                'gender_id' => '2',
                'nationality_id' => '4',
                'relationship_id' => '1',
                'current_phone_number' => '01027594793',
            ],

        ];

        foreach ($individuals as $n) {
            Individual::create($n);
        } 
    }
}
