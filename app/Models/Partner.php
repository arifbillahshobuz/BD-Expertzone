<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'image',
        'address',
        'company',
        'designation_id',
    ];
}
