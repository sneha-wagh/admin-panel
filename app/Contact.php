<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'message',
    ];
}
