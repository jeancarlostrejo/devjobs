<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Vacant $vacant, public User $user)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url("/notifications" );

        return (new MailMessage)
                    ->line(__('You have received a new candidate in your vacancy'))
                    ->line(__('The vacancy is') . ": " . $this->vacant->title)
                    ->action(__('See notifications'), $url)
                    ->line(__('Thank you for using DevJobs!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'vacant_id' => $this->vacant->id,
            'vacant_title' => $this->vacant->title,
            'candidate_id' => $this->user->id
        ];
    }
}
