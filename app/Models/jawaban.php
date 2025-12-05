<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    protected $fillable = [
        'kode_mapel',
        'name_mapel',
        'nis',
        'nameSiswa',
        'email',
        'kelas',
        'jurusan',
        'tugas',
        'pengumpulan',
        'nilai',
        'jawabanpdf',
        'jawabanteks',
        'slugTugas',
        'slugJawaban',
    ];
}
