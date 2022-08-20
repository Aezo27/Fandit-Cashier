<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer_Link extends Model
{
    protected $table = 'footer_link';
    protected $fillable = [
    'judul', 'link',
    ];
}
