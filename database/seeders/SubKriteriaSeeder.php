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
            'C1' => [
                ['nama' => '≤ 30 km', 'bobot' => 5],
                ['nama' => '31 – 45 km', 'bobot' => 4],
                ['nama' => '46–60 km', 'bobot' => 3],
                ['nama' => '61–75 km', 'bobot' => 2],
                ['nama' => '> 75 km', 'bobot' => 1],
            ],

            'C2' => [
                ['nama' => 'Gratis', 'bobot' => 5],
                ['nama' => 'Rp 1.000 – Rp 5.000', 'bobot' => 4],
                ['nama' => 'Rp 5.001 – Rp 10.000', 'bobot' => 3],
                ['nama' => 'Rp 10.001 – Rp 20.000', 'bobot' => 2],
                ['nama' => '> Rp 20.000', 'bobot' => 1],
            ],

            'C3' => [
                ['nama' => '4,8 – 5,0', 'bobot' => 5],
                ['nama' => '4,6 – 4,7', 'bobot' => 4],
                ['nama' => '4,4 – 4,5', 'bobot' => 3],
                ['nama' => '4,0 – 4,3', 'bobot' => 2],
                ['nama' => '< 4,0', 'bobot' => 1],
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
