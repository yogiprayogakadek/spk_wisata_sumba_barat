<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table = 'nilai_alternatif';
    protected $fillable = [
        'histori_perhitungan_id',
        'kriteria_id',
        'sub_kriteria_id',
        'wisata_id',
        'nilai'
    ];

    public function subKriteria()
    {
        return $this->hasOne(SubKriteria::class, 'id', 'sub_kriteria_id');
    }

    public function kriteria()
    {
        return $this->hasOne(Kriteria::class, 'id', 'kriteria_id');
    }

    public function alternatif()
    {
        return $this->hasOne(Wisata::class, 'id', 'wisata_id');
    }
}
