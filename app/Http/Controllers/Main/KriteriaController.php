<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\KriteriaStoreRequest;
use App\Http\Requests\KriteriaUpdateRequest;
use App\Services\KriteriaService;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function __construct(protected KriteriaService $kriteriaService) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->kriteriaService->getDataTable(['id', 'kode', 'nama', 'sifat', 'input_type', 'bobot']);
        }

        return view('main.kriteria.index');
    }

    public function create()
    {
        return view('main.kriteria.create');
    }

    public function store(KriteriaStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->kriteriaService->create($data);

            return redirect()->route('kriteria.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $kriteria = $this->kriteriaService->findById(['id', 'kode', 'nama', 'sifat', 'input_type', 'bobot'], $id);
        return view('main.kriteria.update', compact('kriteria'));
    }

    public function update(KriteriaUpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $this->kriteriaService->update($id, $data);

            return redirect()->route('kriteria.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data  ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->kriteriaService->delete($id);

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
