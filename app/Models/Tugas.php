<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
        'kode_mapel',
        'name_mapel',
        'kelas',
        'tugas',
        'soalteks',
        'soalpdf',
        'opened',
        'due',
        'slug',
    ];
}
