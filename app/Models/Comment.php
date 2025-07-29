<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'post_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Reactions relationship
    public function reactions()
    {
        return $this->morphMany(PostReaction::class, 'reactable');
    }

    // Replies relationship (children)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Parent relationship
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
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
            $user = auth()->user();
        }

        return $user ? $this->reactions()->where('user_id', $user->id)->first() : null;
    }
}
