<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FriendRequestAcceptedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $accepter;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $accepter)
    {
        $this->accepter = $accepter;
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
            ->line('Your friend request has been accepted!')
            ->line($this->accepter->name . ' accepted your friend request.')
            ->action('View Profile', route('user.profile.show', $this->accepter->username))
            ->line('You are now friends!');
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
            'type' => 'friend_request_accepted',
            'user_id' => $this->accepter->id,
            'user_name' => $this->accepter->name,
            'avatar' => $this->accepter->avatar,
            'message' => $this->accepter->name . ' accepted your friend request.',
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
            'type' => 'friend_request_accepted',
            'user_id' => $this->accepter->id,
            'user_name' => $this->accepter->name,
            'avatar' => $this->accepter->avatar,
            'message' => $this->accepter->name . ' accepted your friend request.',
            'created_at' => now()->toISOString(),
        ];
    }
}
