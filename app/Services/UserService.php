<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Yajra\DataTables\DataTables;

class UserService
{
    public function __construct(protected UserRepository $userRepository) {}

    public function getAll(array $fields = ['*'], array $condition = [], array $relationship = [], array $orderBy = [])
    {
        return $this->userRepository->getAll($fields, $condition, $relationship, $orderBy);
    }

    public function findById(array $fields = ['*'], int $id)
    {
        return $this->userRepository->findById($fields, $id);
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }

    public function getDataTable(array $fields)
    {
        $data = $this->getAll($fields);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('user.show', $row->id) . '">
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
