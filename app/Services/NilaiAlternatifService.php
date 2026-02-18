<?php

namespace App\Services;

use App\Repositories\NilaiAlternatifRepository;
use Yajra\DataTables\DataTables;

class NilaiAlternatifService
{
    public function __construct(protected NilaiAlternatifRepository $nilaiAlternatifRepository) {}

    public function getAll(array $fields = ['*'], array $condition = [], array $relationship = [], array $orderBy = [])
    {
        return $this->nilaiAlternatifRepository->getAll($fields, $condition, $relationship, $orderBy);
    }

    public function findSingleData(array $fields = ['*'], array $condition = [])
    {
        return $this->nilaiAlternatifRepository->findSingleData($fields, $condition);
    }

    public function create(array $nilai, int $historiId)
    {
        $data = [];
        foreach ($nilai as $wisata_id => $sifat_list) {
            foreach ($sifat_list as $sifat => $kriteria_list) {
                foreach ($kriteria_list as $kriteria_id => $skor) {
                    $data[] = [
                        'wisata_id' => $wisata_id,
                        'nilai' => $sifat == "cost" ? $skor : null,
                        'kriteria_id' => $kriteria_id,
                        'sub_kriteria_id' => $sifat == "benefit" ? $skor : null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        $data = collect($data)->map(function ($item) use ($historiId) {
            return array_merge($item, ['histori_perhitungan_id' => $historiId]);
        })->all();

        return $this->nilaiAlternatifRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->nilaiAlternatifRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->nilaiAlternatifRepository->delete($id);
    }

    public function getDataTable(array $fields)
    {
        $data = $this->getAll($fields);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('histori.show', $row->id) . '">
                <button type="button"
                    class="justify-content-center w-80 btn mb-1 bg-primary-subtle text-primary">
                    <i class="ti ti-pencil fs-4 me-2"></i>
                    Edit
                </button>
            </a>
            <button type="button"
                    class="justify-content-center w-80 btn mb-1 bg-danger-subtle text-danger btn-hapus" data-id=' . $row->id . '>
                    <i class="ti ti-trash fs-4 me-2"></i>
                    Hapus
                </button>
            ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
