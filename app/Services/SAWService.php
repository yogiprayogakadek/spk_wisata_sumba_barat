<?php

namespace App\Services;

class SAWService
{
    public function collectData($nilai)
    {
        return collect($nilai)->groupBy('wisata_id')->map(function ($items, $wisataId) {
            return [
                'wisata_id'   => $wisataId,
                'nama_wisata' => $items->first()->alternatif->nama,
                'detail'      => $items->mapWithKeys(function ($item) {
                    $nilai = $item->nilai ?? $item->subKriteria->bobot;
                    return [
                        $item->kriteria_id => [
                            'nama_kriteria'  => $item->kriteria->nama,
                            'bobot_kriteria' => $item->kriteria->bobot,
                            'nilai'          => $nilai,
                            'sifat'          => $item->kriteria->sifat,
                        ],
                    ];
                })->toArray(),
            ];
        })->values();
    }

    public function getKriteriaAktif($data, $kriteria)
    {
        return $kriteria->filter(fn($k) => collect($data)->contains(fn($item) => isset($item['detail'][$k->id])))->values();
    }

    public function buildMinMax($data, $kriteriaAktif)
    {
        $minMax = [];

        foreach ($kriteriaAktif as $k) {
            $values = collect($data)->pluck("detail.{$k->id}.nilai")->filter();

            if ($values->count()) {
                $minMax[$k->id] = ['min' => $values->min(), 'max' => $values->max()];
            }
        }

        return $minMax;
    }

    public function normalize($data, $kriteriaAktif, $minMax)
    {
        return $data->map(function ($item) use ($kriteriaAktif, $minMax) {
            foreach ($kriteriaAktif as $k) {
                if (!isset($item['detail'][$k->id])) continue;

                $nilai = $item['detail'][$k->id]['nilai'];
                $normalisasi = $k->sifat === 'cost'
                    ? $minMax[$k->id]['min'] / $nilai
                    : $nilai / $minMax[$k->id]['max'];

                $item['detail'][$k->id]['normalisasi'] = round($normalisasi, 4);
            }

            return $item;
        });
    }

    public function applyBobot($data, $kriteriaAktif)
    {
        return $data->map(function ($item) use ($kriteriaAktif) {
            $total = 0;

            foreach ($kriteriaAktif as $k) {
                if (!isset($item['detail'][$k->id])) continue;

                $normalisasi = $item['detail'][$k->id]['normalisasi'];
                $bobot       = $k->bobot > 1 ? $k->bobot / 100 : $k->bobot;
                $terbobot    = $normalisasi * $bobot;

                $item['detail'][$k->id]['terbobot'] = round($terbobot * 100, 3);
                $total += $terbobot * 100;
            }

            $item['total_nilai'] = round($total, 3);

            return $item;
        });
    }

    public function applyRanking($data)
    {
        return $data->sortByDesc('total_nilai')
            ->values()
            ->map(function ($item, $index) {
                $item['ranking'] = $index + 1;
                return $item;
            });
    }
}
