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
        $criterias = [
            [
                'name' => 'Jumlah Penghasilan Orangtua (JPO)',
                'type' => 'Cost',
                'weight' => 5,
            ],
            [
                'name' => 'Jumlah Tanggungan Orangtua (JTO)',
                'type' => 'Benefit',
                'weight' => 3,
            ],
            [
                'name' => 'Jarak Tempat Tinggal (JTT)',
                'type' => 'Cost',
                'weight' => 4,
            ],
            [
                'name' => 'Nilai Rata-rata Ujian Nasional (UN)',
                'type' => 'Benefit',
                'weight' => 2,
            ],
            [
                'name' => 'Kesanggupan Tinggal di Asrama (AS)',
                'type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Nilai Rata-rata Rapor (NR)',
                'type' => 'Benefit',
                'weight' => 4,
            ],
            [
                'name' => 'Prestasi Akademis (PA)',
                'type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Prestasi Non Akademis (PNA)',
                'type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'name' => 'Ketua Organisasi (KO)',
                'type' => 'Benefit',
                'weight' => 4,
            ],
            [
                'name' => 'Biaya Hidup (BP)',
                'type' => 'Cost',
                'weight' => 3,
            ],
        ];

        DB::table('criterias')->insert($criterias);

        $alternatives = [
            ['name' => 'Andika Pratama'],
            ['name' => 'Dian Saraswati'],
            ['name' => 'Rizky Akbar'],
            ['name' => 'Siti Nurul Hidayah'],
            ['name' => 'Fajar Nugraha'],
            ['name' => 'Aulia Fitriani'],
            ['name' => 'Irfan Kurniawan'],
            ['name' => 'Anisa Putri'],
            ['name' => 'Aditya Wijaya'],
            ['name' => 'Laras Ayu'],
            ['name' => 'Agung Purnama'],
            ['name' => 'Tiara Maulida'],
            ['name' => 'Bayu Prabowo'],
            ['name' => 'Dewi Lestari'],
            ['name' => 'Yoga Saputra'],
            ['name' => 'Nita Permata'],
            ['name' => 'Rizki Ramadhan'],
            ['name' => 'Nurul Fadillah'],
            ['name' => 'Faisal Rahman'],
            ['name' => 'Nadya Utami'],
        ];
        

        DB::table('alternatives')->insert($alternatives);

        $values = [
            [5, 2, 1, 4, 1, 2, 3, 1, 3, 5],
            [5, 1, 1, 3, 1, 3, 3, 2, 1, 1],
            [5, 3, 1, 4, 1, 5, 2, 1, 3, 2],
            [2, 1, 3, 2, 2, 4, 2, 3, 3, 3],
            [3, 4, 4, 2, 3, 2, 1, 3, 1, 4],
            [5, 5, 5, 2, 3, 4, 1, 2, 3, 2],
            [1, 3, 2, 5, 2, 5, 2, 3, 1, 3],
            [1, 1, 3, 1, 2, 4, 2, 2, 3, 3],
            [2, 2, 3, 3, 1, 4, 3, 1, 3, 2],
            [3, 5, 2, 4, 2, 4, 3, 3, 3, 2],
            [3, 4, 2, 5, 3, 3, 2, 3, 1, 1],
            [2, 2, 5, 1, 3, 2, 3, 1, 3, 1],
            [1, 5, 2, 2, 2, 1, 1, 3, 1, 4],
            [4, 3, 1, 1, 3, 5, 3, 2, 1, 5],
            [3, 4, 2, 1, 2, 4, 2, 3, 1, 4],
            [2, 3, 2, 5, 1, 5, 1, 3, 3, 5],
            [1, 1, 4, 3, 3, 5, 3, 3, 1, 2],
            [4, 3, 3, 4, 2, 3, 1, 2, 3, 3],
            [3, 4, 4, 5, 2, 3, 2, 1, 3, 3],
            [5, 2, 5, 3, 1, 5, 3, 3, 1, 1],
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
