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
                'input_type' => 'numeric',
                'bobot' => 25,
            ],
            [
                'kode' => 'C2',
                'nama' => 'Jarak dari Kota',
                'sifat' => 'cost',
                'input_type' => 'numeric',
                'bobot' => 20,
            ],
            [
                'kode' => 'C3',
                'nama' => 'Fasilitas',
                'sifat' => 'benefit',
                'input_type' => 'sub',
                'bobot' => 20,
            ],
            [
                'kode' => 'C4',
                'nama' => 'Keindahan Alam',
                'sifat' => 'benefit',
                'input_type' => 'sub',
                'bobot' => 20,
            ],
            [
                'kode' => 'C5',
                'nama' => 'Aksesibilitas',
                'sifat' => 'benefit',
                'input_type' => 'sub',
                'bobot' => 15,
            ],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}
