<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class walikelas extends Model
{
    protected $fillable =[
        'id',
        'nuptk',
        'nameGuru',
        'email',
        'gender',
        'kelas',
        'jurusan',
        'slug',
    ];
}
