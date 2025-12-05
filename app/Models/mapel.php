<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $fillable = [
        'id',
        'kode_mapel',
        'name_mapel',
        'jadwal',
        'kelas',
        'jurusan',
        'nuptk',
        'nameGuru',
        'email',
        'slug',
    ];
}
