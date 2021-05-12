<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IdentityCard;

class IdentityCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identity_cards')->delete();

        $identityCards = [
            ['914-13C0001', 'Amira'],
            ['914-13C0002', 'Elsadig'],
            ['914-13C0003', 'Mona'],
        ];

        foreach ($identityCards as $identityCard) {
            IdentityCard::create([
                'number' => $identityCard[0],
                'owner' => $identityCard[1],
            ]);
        }

    }
}
