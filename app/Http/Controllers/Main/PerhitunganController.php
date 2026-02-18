<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\HistoriPerhitungan;
use App\Services\KriteriaService;
use App\Services\NilaiAlternatifService;
use App\Services\SAWService;

class PerhitunganController extends Controller
{
    public function __construct(
        protected NilaiAlternatifService $nilaiAlternatifService,
        protected KriteriaService $kriteriaService,
        protected SAWService $sawService
    ) {}

    public function saw($historiId)
    {
        $histori = HistoriPerhitungan::findOrFail($historiId);

        if (Gate::denies('manage', $histori)) {
            return redirect()->route('error.forbidden');
        }

        $nilai = $this->nilaiAlternatifService->getAll(
            ['histori_perhitungan_id', 'wisata_id', 'kriteria_id', 'sub_kriteria_id', 'nilai'],
            ['histori_perhitungan_id' => $historiId],
            ['subKriteria:id,nama,bobot', 'kriteria:id,nama,bobot,sifat', 'alternatif:id,nama']
        );

        $kriteria = $this->kriteriaService->getAll(['id', 'nama', 'sifat', 'bobot'], [], [], ['id' => 'asc']);

        $data = $this->sawService->collectData($nilai);
        $kriteriaAktif = $this->sawService->getKriteriaAktif($data, $kriteria);
        $minMax = $this->sawService->buildMinMax($data, $kriteriaAktif);
        $data = $this->sawService->normalize($data, $kriteriaAktif, $minMax);
        $data = $this->sawService->applyBobot($data, $kriteriaAktif);
        $data = $this->sawService->applyRanking($data);

        return view('main.perhitungan.saw')->with([
            'nilai'      => $nilai->groupBy('wisata_id'),
            'data'       => $data,
            'histori_id' => $historiId,
            'kriteria'   => $kriteriaAktif,
        ]);
    }
}
