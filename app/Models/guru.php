<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $fillable =[
        'id',
        'nuptk',
        'nameGuru',
        'email',
        'gender',
        'password',
        'guruid',
        'slug',
    ];
}
