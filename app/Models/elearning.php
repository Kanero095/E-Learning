<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class elearning extends Model
{
    protected $fillable =[
        'kode_mapel',
        'name_mapel',
        'kelas',
        'pertemuan',
        'materi',
        'slug',
    ];
}
