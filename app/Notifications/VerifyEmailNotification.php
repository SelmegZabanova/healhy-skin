<?php
namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends Notification
{
public function toMail($notifiable)
{
$verificationUrl = $this->verificationUrl($notifiable);

return (new MailMessage)
->subject('Подтверждение email адреса')
->line('Пожалуйста, нажмите кнопку ниже для подтверждения вашего email адреса.')
->action('Подтвердить email адрес', $verificationUrl)
->line('Если вы не создавали аккаунт, никаких действий не требуется.');
}

protected function verificationUrl($notifiable)
{
return URL::temporarySignedRoute(
'verification.verify',
Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
[
'id' => $notifiable->getKey(),
'hash' => sha1($notifiable->getEmailForVerification()),
]
);
}
}
