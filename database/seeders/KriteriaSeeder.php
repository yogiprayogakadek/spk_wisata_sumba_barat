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
                'nama' => 'Harga Tiket',
                'sifat' => 'cost',
                'bobot' => 25,
            ],
            [
                'kode' => 'C2',
                'nama' => 'Jarak/Lokasi',
                'sifat' => 'cost',
                'bobot' => 20,
            ],
            [
                'kode' => 'C3',
                'nama' => 'Fasilitas',
                'sifat' => 'benefit',
                'bobot' => 20,
            ],
            [
                'kode' => 'C4',
                'nama' => 'Rating',
                'sifat' => 'cost',
                'bobot' => 20,
            ],
            [
                'kode' => 'C5',
                'nama' => 'Aksesibilitas',
                'sifat' => 'benefit',
                'bobot' => 15,
            ],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}
