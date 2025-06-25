<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostReaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'reactable_id', 'reactable_type', 'reaction_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reactable()
    {
        return $this->morphTo();
    }

    public function reaction()
    {
        return $this->belongsTo(Reaction::class);
    }
}
