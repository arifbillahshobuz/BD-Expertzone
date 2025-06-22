<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'title',
    ];
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }


}
