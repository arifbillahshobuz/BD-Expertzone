<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $from_id;


    //dd this message 
    /**
     * Create a new event instance.
     */
    public function __construct($message, $from_id)
    {
        $this->message = $message;
        $this->from_id = $from_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('message.' . $this->message->to_id),
        ];
    }

    function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'body' => $this->message->body,
            'to_id' => $this->message->to_id,
            'attachment' => json_decode($this->message->attachment),
            'from_id' => $this->from_id,
        ];
    }

}
