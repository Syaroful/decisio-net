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

        $values = [
            [5, 2, 1, 4, 1, 2, 4, 1, 5, 5],
            [5, 1, 1, 3, 1, 6, 6, 2, 6, 1],
            [5, 3, 1, 4, 1, 5, 5, 1, 7, 2],
            [2, 7, 3, 2, 8, 4, 2, 3, 8, 3],
            [3, 4, 4, 2, 3, 2, 1, 3, 4, 4],
            [5, 5, 6, 2, 3, 7, 1, 2, 5, 2],
            [6, 3, 7, 5, 4, 5, 2, 4, 5, 3],
            [4, 1, 3, 6, 2, 4, 2, 5, 5, 3],
            [7, 2, 3, 8, 1, 4, 3, 6, 6, 2],
            [8, 8, 6, 4, 2, 4, 3, 4, 4, 2],
            [3, 7, 7, 5, 5, 3, 4, 3, 7, 1],
            [2, 6, 9, 1, 6, 2, 4, 8, 8, 1],
            [9, 5, 2, 2, 7, 1, 6, 6, 8, 4],
            [4, 3, 1, 1, 4, 5, 5, 4, 4, 5],
            [3, 9, 2, 1, 8, 4, 7, 3, 3, 4],
            [2, 3, 2, 5, 5, 5, 9, 3, 2, 5],
            [1, 5, 4, 3, 3, 5, 8, 3, 1, 6],
            [8, 7, 3, 7, 2, 7, 1, 2, 5, 6],
            [3, 6, 4, 5, 2, 6, 2, 5, 6, 3],
            [5, 2, 5, 3, 1, 5, 3, 5, 7, 1],
        ];

        foreach ($values as $i => $row) {
            foreach ($row as $j => $score) {
                DB::table('values')->insert([
                    'alternative_id' => $i + 1,
                    'criteria_id' => $j + 1,
                    'score' => $score,
                ]);
            }
        }
    }
}
