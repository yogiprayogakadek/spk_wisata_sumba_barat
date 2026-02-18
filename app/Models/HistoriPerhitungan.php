<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriPerhitungan extends Model
{
    protected $table = 'histori_perhitungan';
    protected $fillable = [
        'user_id',
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
