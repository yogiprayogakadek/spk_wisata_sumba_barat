<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\WisataStoreRequest;
use App\Http\Requests\WisataUpdateRequest;
use App\Services\WisataService;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function __construct(protected WisataService $wisataService) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->wisataService->getDataTable(['id', 'nama', 'alamat', 'rating_google', 'url_map_google', 'foto', 'is_active']);
        }

        return view('main.wisata.index');
    }

    public function create()
    {
        return view('main.wisata.create');
    }

    public function store(WisataStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->wisataService->create($data);

            return redirect()->route('wisata.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $wisata = $this->wisataService->findById(['id', 'nama', 'deskripsi', 'alamat', 'rating_google', 'url_map_google', 'foto', 'is_active'], $id);
        return view('main.wisata.update', compact('wisata'));
    }

    public function update(WisataUpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $this->wisataService->update($id, $data);

            return redirect()->route('wisata.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data  ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->wisataService->delete($id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data ' . $e->getMessage());
        }
    }
}
