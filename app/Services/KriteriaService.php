<?php

namespace App\Services;

use App\Repositories\KriteriaRepository;
use Yajra\DataTables\DataTables;

class KriteriaService
{
    public function __construct(protected KriteriaRepository $kriteriaRepository) {}

    public function getAll(array $fields = ['*'], array $condition = [], array $relationship = [], array $orderBy = [])
    {
        return $this->kriteriaRepository->getAll($fields, $condition, $relationship, $orderBy);
    }

    public function findById(array $fields = ['*'], int $id)
    {
        return $this->kriteriaRepository->findById($fields, $id);
    }

    public function create(array $data)
    {
        return $this->kriteriaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->kriteriaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->kriteriaRepository->delete($id);
    }

    public function getDataTable(array $fields)
    {
        $data = $this->getAll($fields);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('sifat', function ($row) {
                return ucfirst($row->sifat);
            })
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('kriteria.show', $row->id) . '">
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
            ->rawColumns(['actions', 'sifat'])
            ->make(true);
    }
}
