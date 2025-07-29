<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $parent_id;
    public $post_id;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->parent_id = $data['parent_id'];
        $this->post_id = $data['post_id'];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('post.' . $this->post_id);
    }
}
