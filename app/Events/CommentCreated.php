<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class CommentCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $postId;
    public $chatId;

    /**
     * Create a new event instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->postId = $data['post_id'] ?? null;
        $this->chatId = $data['chat_id'] ?? null;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        if ($this->chatId) {
            return new PrivateChannel('chat.' . $this->chatId);
        }
        return new PrivateChannel('post.' . $this->postId);
    }

    public function broadcastAs(): string
    {
        return 'CommentCreated';
    }

    public function broadcastWith()
    {
        if ($this->chatId) {
            return ['message' => $this->data];
        }
        return ['comment' => $this->data];
    }
}
