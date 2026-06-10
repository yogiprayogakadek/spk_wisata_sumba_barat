<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class SubKriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $subKriteria = [
            'C3' => [
                ['nama' => 'Sangat Lengkap', 'bobot' => 5],
                ['nama' => 'Lengkap', 'bobot' => 4],
                ['nama' => 'Cukup', 'bobot' => 3],
                ['nama' => 'Kurang', 'bobot' => 2],
                ['nama' => 'Tidak Ada', 'bobot' => 1],
            ],
            // 'C4' => [
            //     ['nama' => 'Sangat Indah', 'bobot' => 5],
            //     ['nama' => 'Indah', 'bobot' => 4],
            //     ['nama' => 'Cukup Indah', 'bobot' => 3],
            //     ['nama' => 'Biasa Saja', 'bobot' => 2],
            //     ['nama' => 'Kurang Menarik', 'bobot' => 1],
            // ],
            'C5' => [
                ['nama' => 'Sangat Mudah', 'bobot' => 5],
                ['nama' => 'Mudah', 'bobot' => 4],
                ['nama' => 'Sedang', 'bobot' => 3],
                ['nama' => 'Sulit', 'bobot' => 2],
                ['nama' => 'Sangat Sulit', 'bobot' => 1],
            ],
        ];

        foreach ($subKriteria as $kode => $subs) {
            $kriteria = Kriteria::where('kode', $kode)->first();
            if ($kriteria) {
                foreach ($subs as $sub) {
                    SubKriteria::create([
                        'kriteria_id' => $kriteria->id,
                        'nama' => $sub['nama'],
                        'bobot' => $sub['bobot'],
                    ]);
                }
            }
        }
    }
}
