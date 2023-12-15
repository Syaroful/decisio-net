<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $criterias = [
            [
                'name' => 'Harga',
                'type' => 'cost',
                'weight' => 0.3,
            ],
            [
                'name' => 'Kualitas',
                'type' => 'benefit',
                'weight' => 0.3,
            ],
            [
                'name' => 'Fitur',
                'type' => 'benefit',
                'weight' => 0.2,
            ],
            [
                'name' => 'Desain',
                'type' => 'benefit',
                'weight' => 0.1,
            ],
            [
                'name' => 'Garansi',
                'type' => 'benefit',
                'weight' => 0.05,
            ],
            [
                'name' => 'Biaya perawatan',
                'type' => 'cost',
                'weight' => 0.1,
            ],
            [
                'name' => 'Layanan pelanggan',
                'type' => 'benefit',
                'weight' => 0.05,
            ],
            [
                'name' => 'Reputasi merek',
                'type' => 'benefit',
                'weight' => 0.05,
            ],
            [
                'name' => 'Kemudahan penggunaan',
                'type' => 'benefit',
                'weight' => 0.05,
            ],
            [
                'name' => 'Ketersediaan',
                'type' => 'benefit',
                'weight' => 0.05,
            ],

        ];
        DB::table('criterias')->insert($criterias);

        $alternatives = [
            [
                'name' => 'Xiaomi Redmi Note 9 Pro',
            ],
            [
                'name' => 'Samsung Galaxy A51',
            ],
            [
                'name' => 'Realme 6 Pro',
            ],
            [
                'name' => 'Samsung Galaxy A31',
            ],
            [
                'name' => 'Xiaomi Redmi Note 8 Pro',
            ],
            [
                'name' => 'iPhone 11 Pro Max',
            ],
            [
                'name' => 'Samsung Galaxy S20 Ultra',
            ],
            [
                'name' => 'Google Pixel 4a',
            ],
            [
                'name' => 'OnePlus 8 Pro',
            ],
            [
                'name' => 'Huawei P40 Pro',
            ],
            [
                'name' => 'Sony Xperia 1 II',
            ],
            [
                'name' => 'LG V60 ThinQ',
            ],
            [
                'name' => 'Motorola Edge Plus',
            ],
            [
                'name' => 'Nokia 9 PureView',
            ],
            [
                'name' => 'Oppo Find X2 Pro',
            ],
            [
                'name' => 'Vivo X50 Pro',
            ],
            [
                'name' => 'Asus ROG Phone 3',
            ],
            [
                'name' => 'Lenovo Legion Phone Duel',
            ],
            [
                'name' => 'BlackBerry Key2',
            ],
            [
                'name' => 'HTC U12 Plus',
            ],
        ];
        DB::table('alternatives')->insert($alternatives);

        $criteriasCount = 10;
        $alternativesCount = 20;

        for ($i = 0; $i < $criteriasCount; $i++) {
            for ($j = 0; $j < $alternativesCount; $j++) {
                $value = rand(50, 99); // Assign value randomly
                DB::table('values')->insert([
                    'criteria_id' => $i + 1,
                    'alternative_id' => $j + 1,
                    'score' => $value
                ]);
            }
        }
    }
}
