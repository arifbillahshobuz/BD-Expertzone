<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name', 'icon_path'];

    public function postReactions()
    {
        return $this->hasMany(PostReaction::class);
    }
}
