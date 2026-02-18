<?php

namespace App\Repositories;

use App\Models\SubKriteria;

class SubKriteriaRepository
{
    public function __construct(protected SubKriteria $model) {}

    public function getAll(array $fields = ['*'], array $condition = [], array $relationship = [])
    {
        return $this->model::query()
            ->select($fields)
            ->when(!empty($relationship), function ($query) use ($relationship) {
                return $query->with($relationship);
            })
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where($condition);
            })
            ->get();
    }

    public function findById(array $fields, int $id)
    {
        return $this->model::select($fields)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update(int $id, array $data)
    {
        $wisata = $this->model::find($id);
        return $wisata->update($data);
    }

    public function delete(int $id)
    {
        $wisata = $this->model::find($id);
        return $wisata->delete();
    }
}
