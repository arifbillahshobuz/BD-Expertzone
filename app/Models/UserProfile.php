<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'gender',
        'blood_group',
        'language',
        'relationship',
        'bio',
        'education',
        'date_of_birth',
        'hobby',
        'present_address',
        'permanent_address',
        'user_id',
        'designation_id',
        'cv',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
