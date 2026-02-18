<?php

namespace App\Repositories;

use App\Models\Wisata;

class WisataRepository
{
    public function __construct(protected Wisata $model) {}

    public function getAll(array $condition = [], array $fields = ['*'])
    {
        // return $this->model::select($fields)->get();
        return $this->model::select($fields)
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where($condition);
            })->get();
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
