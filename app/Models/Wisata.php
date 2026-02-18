<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'foto',
        'rating_google',
        'url_map_google',
        'is_active'
    ];
}
