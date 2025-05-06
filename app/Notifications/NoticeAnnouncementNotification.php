<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NoticeAnnouncementNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $notice;

    public function __construct($notice)
    {
        $this->notice = $notice;
    }

    public function via($notifiable)
    {
        return ['database', 'mail']; // Sends notification via database and email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Notice/Announcement')
            ->line($this->notice->title)
            ->action('View Notice', url('/notices/' . $this->notice->id))
            ->line('Thank you for staying updated!');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->notice->title,
            'message' => $this->notice->message,
            'url' => url('/notices/' . $this->notice->id),
        ];
    }
}
