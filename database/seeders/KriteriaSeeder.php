<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $kriteria = [
            [
                'kode' => 'C1',
                'nama' => 'Waktu Tempuh (km)',
                'sifat' => 'benefit',
                'bobot' => 30,
            ],
            [
                'kode' => 'C2',
                'nama' => 'Tiket Masuk',
                'sifat' => 'cost',
                'bobot' => 30,
            ],
            [
                'kode' => 'C3',
                'nama' => 'Popularitas',
                'sifat' => 'benefit',
                'bobot' => 40,
            ],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}
