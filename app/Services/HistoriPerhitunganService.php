<?php

namespace App\Services;

use App\Repositories\HistoriPerhitunganRepository;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HistoriPerhitunganService
{
    public function __construct(protected HistoriPerhitunganRepository $historiRepository, protected NilaiAlternatifService $nilaiAlternatifService) {}

    public function getAll(array $fields = ['*'], array $condition = [], array $relationship = [])
    {
        return $this->historiRepository->getAll($fields, $condition, $relationship);
    }

    public function findById(array $fields = ['*'], int $id)
    {
        return $this->historiRepository->findById($fields, $id);
    }

    public function create(array $nilai)
    {
        return DB::transaction(function () use ($nilai) {
            try {
                $histori = $this->historiRepository->create(['tanggal' => date('Y-m-d'), 'user_id' => auth()->user()->id]);
                if ($histori) {
                    $this->nilaiAlternatifService->create($nilai, $histori->id);
                }

                return $histori;
            } catch (\Exception $e) {
                throw $e;
            }
        });
    }

    public function update(int $id, array $data)
    {
        return $this->historiRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->historiRepository->delete($id);
    }

    public function getDataTable(array $fields, array $condition = [])
    {
        $data = $this->getAll($fields, $condition, ['user']);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user->nama ?? '-';
            })
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('perhitungan.saw', $row->id) . '">
                <button type="button"
                    class="justify-content-center w-80 btn mb-1 bg-primary-subtle text-primary">
                    <i class="ti ti-eye fs-4 me-2"></i>
                    Detail
                </button>
            </a>
            ';
            })
            ->rawColumns(['actions', 'user'])
            ->make(true);
    }
}
