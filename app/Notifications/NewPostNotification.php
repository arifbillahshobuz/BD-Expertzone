<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Post;

class NewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'new_post',
            'message' => $this->post->user->name . ' shared a new post',
            'post_id' => $this->post->id,
            'user_id' => $this->post->user_id,
            'user_name' => $this->post->user->name,
            'user_avatar' => $this->post->user->avatar,
            'content' => \Illuminate\Support\Str::limit($this->post->content, 100),
            'url' => route('posts.show', $this->post->id),
            'created_at' => $this->post->created_at->toISOString(),
        ];
    }

    public function toDatabase($notifiable)
    {
        return $this->toArray($notifiable);
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'type' => 'new_post',
            'message' => $this->post->user->name . ' shared a new post',
            'post_id' => $this->post->id,
            'user_id' => $this->post->user_id,
            'user_name' => $this->post->user->name,
            'user_avatar' => $this->post->user->avatar,
            'content' => \Illuminate\Support\Str::limit($this->post->content, 100),
            'url' => route('posts.show', $this->post->id),
            'created_at' => $this->post->created_at->toISOString(),
        ]);
    }
}
