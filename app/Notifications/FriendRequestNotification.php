<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FriendRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sender;
    protected $friendRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $sender, FriendRequest $friendRequest)
    {
        $this->sender = $sender;
        $this->friendRequest = $friendRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('You have received a new friend request.')
            ->line($this->sender->name . ' wants to be your friend.')
            ->action('View Friend Requests', route('friend.requests'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'friend_request',
            'user_id' => $this->sender->id,
            'sender_id' => $this->sender->id, // Add this for clarity
            'user_name' => $this->sender->name,
            'username' => $this->sender->username,
            'avatar' => $this->sender->avatar,
            'request_id' => $this->friendRequest->id,
            'message' => $this->sender->name . ' sent you a friend request.',
            'created_at' => now()->toISOString(),
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'type' => 'friend_request',
            'user_id' => $this->sender->id,
            'sender_id' => $this->sender->id, // Add this for clarity
            'user_name' => $this->sender->name,
            'username' => $this->sender->username,
            'avatar' => $this->sender->avatar,
            'request_id' => $this->friendRequest->id,
            'message' => $this->sender->name . ' sent you a friend request.',
            'created_at' => now()->toISOString(),
        ];
    }
}
