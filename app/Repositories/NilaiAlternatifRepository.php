<?php

namespace App\Repositories;

use App\Models\NilaiAlternatif;

class NilaiAlternatifRepository
{
    public function __construct(protected NilaiAlternatif $model) {}

    public function getAll(
        array $fields = ['*'],
        array $condition = [],
        array $relationship = [],
        array $orderBy = [],
    ) {
        return $this->model::query()
            ->select($fields)
            ->when(!empty($relationship), function ($query) use ($relationship) {
                return $query->with($relationship);
            })
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where($condition);
            })
            ->when(!empty($orderBy), function ($query) use ($orderBy) {
                foreach ($orderBy as $column => $direction) {
                    $query->orderBy($column, $direction);
                }
                return $query;
            })
            ->get();
    }

    public function findSingleData(array $fields = ['*'], array $condition = [])
    {
        // return $this->model::select($fields)->findOrFail($id);
        return $this->model::query()
            ->select($fields)
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where($condition);
            })->firtsOrFail();
    }

    public function create(array $data)
    {
        return $this->model::insert($data);
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
