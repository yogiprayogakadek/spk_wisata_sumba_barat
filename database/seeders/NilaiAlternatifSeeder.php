<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoriPerhitungan;
use App\Models\Wisata;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class NilaiAlternatifSeeder extends Seeder
{
    public function run(): void
    {
        $historis = HistoriPerhitungan::all();
        $wisatas = Wisata::all();
        $kriterias = Kriteria::with('subKriteria')->get();

        foreach ($historis as $histori) {
            foreach ($wisatas as $wisata) {
                foreach ($kriterias as $kriteria) {
                    $subKriteriaId = null;
                    $nilai = 0;

                    if (in_array($kriteria->kode, ['C1', 'C2', 'C4'])) {
                        if ($kriteria->kode === 'C1') {
                            $nilai = rand(5, 50) * 1000;
                        } elseif ($kriteria->kode === 'C2') {
                            $nilai = rand(1, 100);
                        } elseif ($kriteria->kode === 'C4') {
                            $nilai = rand(1, 5);
                        } else {
                            $nilai = rand(1, 100);
                        }
                    } else {
                        $sub = $kriteria->subKriteria->random();
                        $subKriteriaId = $sub->id;
                        $nilai = $sub->bobot;
                    }

                    NilaiAlternatif::create([
                        'histori_perhitungan_id' => $histori->id,
                        'kriteria_id' => $kriteria->id,
                        'sub_kriteria_id' => $subKriteriaId,
                        'wisata_id' => $wisata->id,
                        'nilai' => $nilai,
                    ]);
                }
            }
        }
    }
}
