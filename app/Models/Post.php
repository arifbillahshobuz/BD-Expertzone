<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// Removed: use App\Models\Share; // This model does not exist
use App\Models\Comment;
use App\Models\PostCategory;
use App\Models\PostReaction;
use App\Models\User;


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
        'is_featured',
    ];

    protected $casts = [
        'media' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    const TYPE_USER = 0;
    const TYPE_ADMIN = 1;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $sourceTitle = $post->title ?? Str::limit($post->content, 50, '');
            $post->slug = $post->generateUniqueSlug($sourceTitle);
        });
    }

    protected function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;
        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        return $slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

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

    public function reactions()
    {
        return $this->morphMany(PostReaction::class, 'reactable');
    }

    public function getReactionCounts()
    {
        return $this->reactions()
            ->selectRaw('reaction_id, count(*) as count')
            ->groupBy('reaction_id')
            ->with('reaction')
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->reaction->name => [
                        'count' => $item->count,
                        'icon_path' => $item->reaction->icon_path,
                        'display_name' => $item->reaction->display_name
                    ]
                ];
            });
    }

    public function getUserReaction(User $user = null)
    {
        if (!$user) {
            $user = Auth::user();
        }

        return $user ? $this->reactions()->where('user_id', $user->id)->first() : null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getReactionsCountAttribute()
    {
        return $this->reactions()->count();
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }
}
