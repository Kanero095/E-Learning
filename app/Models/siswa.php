<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = [
        'email',
        'nis',
        'nameSiswa',
        'tempatlahir',
        'tanggallahir',
        'kelas',
        'jurusan',
        'gender',
        'agama',
        'password',
        'slug',
        'siswaid',
    ];
}
