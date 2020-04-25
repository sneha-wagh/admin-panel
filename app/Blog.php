<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";
    protected $fillable = [
        'image', 'heading', 'title', 'content',
    ];
}
