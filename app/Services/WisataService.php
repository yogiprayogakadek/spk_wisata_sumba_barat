<?php

namespace App\Services;

use App\Repositories\WisataRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class WisataService
{
    public function __construct(protected WisataRepository $wisataRepository) {}

    public function getAll(array $condition, array $fields)
    {
        return $this->wisataRepository->getAll($condition, $fields);
    }

    public function findById(array $fields = ['*'], int $id)
    {
        return $this->wisataRepository->findById($fields, $id);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            if (isset($data['foto']) && $data['foto'] instanceof UploadedFile) {
                $data['foto'] = $this->uploadImage($data['foto']);
            } else {
                $data['foto'] = '';
            }

            try {
                return $this->wisataRepository->create($data);
            } catch (\Exception $e) {
                if (isset($data['foto']) && is_string($data['foto'])) {
                    Storage::disk('public')->delete($data['foto']);
                }
                throw $e;
            }
        });
    }

    public function update(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $wisata = $this->wisataRepository->findById(['id', 'foto'], $id);
            $oldFoto = $wisata->foto;
            $newFotoUploaded = false;

            if (isset($data['foto']) && $data['foto'] instanceof UploadedFile) {
                // if ($wisata && !empty($wisata->foto)) {
                $data['foto'] = $this->uploadImage($data['foto']);
                $newFotoUploaded = true;
                // }
            }

            try {
                $updated =  $this->wisataRepository->update($id, $data);

                if ($updated && $newFotoUploaded && !empty($oldFoto)) {
                    $this->deleteImage($wisata->foto);
                }

                return $updated;
            } catch (\Exception $e) {
                if ($newFotoUploaded) {
                    Storage::disk('public')->delete($data['foto']);
                }
                throw $e;
            }
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            $wisata = $this->findById(['id', 'foto'], $id);

            if (!$wisata) {
                throw new \Exception("Data wisata tidak ditemukan.");
            }

            $oldFoto = $wisata->foto;

            try {
                $deleted = $this->wisataRepository->delete($id);

                if ($deleted && !empty($oldFoto)) {
                    $this->deleteImage($oldFoto);
                }

                return $deleted;
            } catch (\Exception $e) {
                throw $e;
            }
        });
    }

    public function uploadImage(UploadedFile $file)
    {
        $path = $file->store('wisata', 'public');

        return $path;
    }

    public function deleteImage(string $imagePath)
    {
        $relativePath = 'wisata/' . basename($imagePath);

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }

    public function getDataTable(array $fields = ['*'])
    {
        $data = $this->getAll([], $fields);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return $row->is_active ? 'Active' : 'Inactive';
            })
            ->addColumn('foto', function ($row) {
                $url = $row->foto
                    ? asset('storage/' . $row->foto)
                    : asset('assets/images/image_not_available.webp');

                return '<img src="' . $url . '" border="0" width="80" class="img-rounded" align="center" />';
            })
            ->addColumn('actions', function ($row) {
                return '
            <a href="' . route('wisata.show', $row->id) . '">
                <button type="button"
                    class="justify-content-center w-80 btn mb-1 bg-primary-subtle text-primary">
                    <i class="ti ti-pencil fs-4 me-2"></i>
                    Edit
                </button>
            </a>
            ';
            })
            ->rawColumns(['actions', 'foto'])
            ->make(true);
    }
}
