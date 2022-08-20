<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = [
        'judul', 'isi',
    ];
}
