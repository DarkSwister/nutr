<?php

namespace App\Domains\Auth\Notifications\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

/**
 * Class VerifyEmail.
 */
class DeleteCodeEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject((config('app.live_mode') ? '' : 'DEV ') . __('Delete Your Account'))
            ->line(new HtmlString("<h2>" . __('We\'re sorry you\'re leaving.') . "</h2>"))
            ->line(__('Please enter this confirmation code in the game window: '))
            ->line(new HtmlString("<h1> $notifiable->code </h1>"))
            ->line(__('From your mobile device use the code to confirm account deletion.'));
    }

}
