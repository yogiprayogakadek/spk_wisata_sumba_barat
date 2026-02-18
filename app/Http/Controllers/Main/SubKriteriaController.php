<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubKriteriaStoreRequest;
use App\Http\Requests\SubKriteriaUpdateRequest;
use App\Services\KriteriaService;
use App\Services\SubKriteriaService;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function __construct(protected SubKriteriaService $subKriteriaService, protected KriteriaService $kriteriaService) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->subKriteriaService->getDataTable(['id', 'kriteria_id', 'nama', 'bobot']);
        }

        return view('main.sub_kriteria.index');
    }

    public function create()
    {
        $kriteria = $this->kriteriaService->getAll(['id', 'nama', 'kode'], ['input_type' => 'sub'], []);
        return view('main.sub_kriteria.create', compact('kriteria'));
    }

    public function store(SubKriteriaStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->subKriteriaService->create($data);

            return redirect()->route('sub.kriteria.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $kriteria = $this->kriteriaService->getAll(['id', 'nama', 'kode'], ['input_type' => 'sub'], []);
        $subKriteria = $this->subKriteriaService->findById(['id', 'kriteria_id', 'nama', 'bobot'], $id);
        return view('main.sub_kriteria.update', compact('subKriteria', 'kriteria'));
    }

    public function update(SubKriteriaUpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $this->subKriteriaService->update($id, $data);

            return redirect()->route('sub.kriteria.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data  ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->subKriteriaService->delete($id);

            return response()->json([
                'title' => 'Terhapus',
                'text' => 'Data berhasil terhapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'title' => 'Gagal',
                'text' => 'Terjadi kesalahan saat menghapus data ' . $e->getMessage(),
                'icon' => 'error'
            ]);
            // return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data ' . $e->getMessage());
        }
    }
}
