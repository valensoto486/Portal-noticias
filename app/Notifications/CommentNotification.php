<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotification extends Notification
{
    use Queueable;

    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['database']; // o ['mail'] para enviar por correo
    }

    public function toArray($notifiable)
    {
        return [
            'comment' => $this->comment,
            'created_at' => now(),
        ];
    }
}
