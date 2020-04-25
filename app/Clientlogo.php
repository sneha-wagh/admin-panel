<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientlogo extends Model
{
    protected $table = "clientlogos";
    protected $fillable = [
        'title', 'image',
    ];
}
