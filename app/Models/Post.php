<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
        'media',
        'slug',
        'is_published',
        'type',
        'user_id',
        'post_category_id',
        'published_at',
        'is_featured'
    ];

    protected $casts = [
        'media' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Post types
    const TYPE_USER = 0;
    const TYPE_ADMIN = 1;

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeUserPosts($query)
    {
        return $query->where('type', self::TYPE_USER);
    }
}

