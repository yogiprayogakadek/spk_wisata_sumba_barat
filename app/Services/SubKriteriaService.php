<?php

namespace App\Services;

use App\Repositories\SubKriteriaRepository;
use Yajra\DataTables\DataTables;

class SubKriteriaService
{
    public function __construct(protected SubKriteriaRepository $subkriteriaRepository) {}

    public function getAll(array $fields, array $condition, array $relationship)
    {
        return $this->subkriteriaRepository->getAll($fields, $condition, $relationship);
    }

    public function findById(array $fields = ['*'], int $id)
    {
        return $this->subkriteriaRepository->findById($fields, $id);
    }

    public function create(array $data)
    {
        return $this->subkriteriaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->subkriteriaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->subkriteriaRepository->delete($id);
    }

    public function getDataTable(array $fields = ['*'])
    {
        $data = $this->getAll($fields, [], []);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('kode_kriteria', function ($row) {
                return $row->kriteria->kode . '/' . $row->kriteria->nama;
            })
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('sub.kriteria.show', $row->id) . '">
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
