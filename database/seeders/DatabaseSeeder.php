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
                'weight' => 0.4,
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
    }
}
