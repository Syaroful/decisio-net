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
                'weight' => 2,
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
            [
                'name' => 'Siswa 1',
            ],
            [
                'name' => 'Siswa 2',
            ],
            [
                'name' => 'Siswa 3',
            ],
            [
                'name' => 'Siswa 4',
            ],
            [
                'name' => 'Siswa 5',
            ],
            [
                'name' => 'Siswa 6',
            ],
            [
                'name' => 'Siswa 7',
            ],
            [
                'name' => 'Siswa 8',
            ],
            [
                'name' => 'Siswa 9',
            ],
            [
                'name' => 'Siswa 10',
            ],
            [
                'name' => 'Siswa 11',
            ],
            [
                'name' => 'Siswa 12',
            ],
            [
                'name' => 'Siswa 13',
            ],
            [
                'name' => 'Siswa 14',
            ],
            [
                'name' => 'Siswa 15',
            ],
            [
                'name' => 'Siswa 16',
            ],
            [
                'name' => 'Siswa 17',
            ],
            [
                'name' => 'Siswa 18',
            ],
            [
                'name' => 'Siswa 19',
            ],
            [
                'name' => 'Siswa 20',
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
