<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /** @var string*/
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], true);

        $expireMinutes = config('auth.passwords.users.expire', 60);

        return (new MailMessage)

            ->subject('Jelszó visszaállítása - HorgászApp')
            ->greeting('Helló!')
            ->line('Emailt kaptunk, hogy szeretnéd visszaállítani a jelszavadat.')
            ->action('Jelszó visszaállítása', $url)
            ->line('Ez a link ' . $expireMinutes . ' perc múlva lejár.')
            ->line('Ha nem te kérted a jelszó visszaállítását, akkor nem kell semmit sem tenned.')
            ->salutation('Üdvözlettel, HorgászApp csapata');
            
    }
}
