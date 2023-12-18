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
                'name' => 'Jumlah Penghasilan Orang Tua (JPO)',
                'type' => 'cost',
                'weight' => 5,
            ],
            [
                'name' => 'Jumlah Tanggungan Orang Tua (JTO)',
                'type' => 'benefit',
                'weight' => 3,
            ],
            [
                'name' => 'Jarak Tempat Tinggal (JTT)',
                'type' => 'cost',
                'weight' => 4,
            ],
            [
                'name' => 'Nilai rata-rata Ujian Nasional (UN)',
                'type' => 'benefit',
                'weight' => 2,
            ],
            [
                'name' => 'Kesanggupan Tinggal di Asrama (AS)',
                'type' => 'benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Nilai Rata-rata Raport (NR)',
                'type' => 'benefit',
                'weight' => 2,
            ],
            [
                'name' => 'Prestasi Akademik (PA)',
                'type' => 'benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Prestasi Non Akademik (PNA)',
                'type' => 'benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Keanggotaan Organisasi (KO)',
                'type' => 'benefit',
                'weight' => 4,
            ],
            [
                'name' => 'Biaya Hidup (BP)',
                'type' => 'cost',
                'weight' => 3,
            ]

        ];
        DB::table('criterias')->insert($criterias);

        $alternatives = [
            [
                'name' => 'Peter Parker',
            ],
            [
                'name' => 'Tony Stark',
            ],
            [
                'name' => 'Steve Rogers',
            ],
            [
                'name' => 'Bruce Banner',
            ],
            [
                'name' => 'Natasha Romanoff',
            ],
            [
                'name' => 'Clint Barton',
            ],
            [
                'name' => 'Thor Odinson',
            ],
            [
                'name' => 'Wanda Maximoff',
            ],
            [
                'name' => 'Vision',
            ],
            [
                'name' => 'Sam Wilson',
            ],
            [
                'name' => 'James Rhodes',
            ],
            [
                'name' => 'Scott Lang',
            ],
            [
                'name' => "T'Challa",
            ],
            [
                'name' => 'Stephen Strange',
            ],
            [
                'name' => 'Carol Danvers',
            ],
            [
                'name' => 'Peter Quill',
            ],
            [
                'name' => 'Gamora',
            ],
            [
                'name' => 'Groot',
            ],
            [
                'name' => 'Rocket Raccoon',
            ],
            [
                'name' => 'Drax',
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
