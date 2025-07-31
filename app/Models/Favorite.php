<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    function user()
    {
        return $this->belongsTo(User::class, 'favorite_id', 'id');
    }
}

