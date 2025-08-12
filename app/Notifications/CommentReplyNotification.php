<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Comment;

class CommentReplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $reply;

    public function __construct(Comment $reply)
    {
        $this->reply = $reply;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'comment_reply',
            'message' => $this->reply->user->name . ' replied to your comment',
            'reply_id' => $this->reply->id,
            'reply_content' => \Illuminate\Support\Str::limit($this->reply->content, 100),
            'replier_id' => $this->reply->user->id,
            'replier_name' => $this->reply->user->name,
            'replier_avatar' => $this->reply->user->avatar,
            'comment_id' => $this->reply->parent_id,
            'post_id' => $this->reply->post_id,
            'url' => route('posts.show', $this->reply->post_id) . '#comment-' . $this->reply->id,
            'created_at' => $this->reply->created_at->toISOString(),
        ];
    }

    public function toDatabase($notifiable)
    {
        return $this->toArray($notifiable);
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'type' => 'comment_reply',
            'message' => $this->reply->user->name . ' replied to your comment',
            'reply_id' => $this->reply->id,
            'reply_content' => \Illuminate\Support\Str::limit($this->reply->content, 100),
            'replier_id' => $this->reply->user->id,
            'replier_name' => $this->reply->user->name,
            'replier_avatar' => $this->reply->user->avatar,
            'comment_id' => $this->reply->parent_id,
            'post_id' => $this->reply->post_id,
            'url' => route('posts.show', $this->reply->post_id) . '#comment-' . $this->reply->id,
            'created_at' => $this->reply->created_at->toISOString(),
        ]);
    }
}
