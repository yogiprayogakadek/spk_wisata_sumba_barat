<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Services\HistoriPerhitunganService;
use App\Services\KriteriaService;
use App\Services\WisataService;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    public function __construct(
        protected WisataService $wisataService,
        protected KriteriaService $kriteriaService,
        protected HistoriPerhitunganService $historiPerhitunganService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user      = auth()->user();
            $condition = $user->role === 'admin' ? [] : ['user_id' => $user->id];
            return $this->historiPerhitunganService->getDataTable(['id', 'user_id', 'tanggal'], $condition);
        }
        return view('main.nilai_alternatif.index');
    }

    public function create()
    {
        $alternatif = $this->wisataService->getAll(['is_active' => true], ['id', 'nama']);
        $kriteria = $this->kriteriaService->getAll(['id', 'nama', 'sifat'], [], [
            'subKriteria:id,kriteria_id,nama,bobot'
        ]);
        return view('main.nilai_alternatif.create', compact('alternatif', 'kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*.*.*' => 'required',
        ], [
            'nilai.*.*.*.required' => 'Field ini wajib diisi',
        ]);

        try {
            $histori = $this->historiPerhitunganService->create($request->nilai);

            return redirect()->route('perhitungan.saw', $histori->id)->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data ' . $e->getMessage());
        }
    }
}
