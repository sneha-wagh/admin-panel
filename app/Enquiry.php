<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquiries";
    protected $fillable = [
        'name', 'email', 'message',
    ];
}
