<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailVerifivationNotification extends Notification
{
    use Queueable;
    public $email_verification_code;
    public $first_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($first_name, $email_verification_code)
    {
        $this->email_verification_code  = $email_verification_code;
        $this->first_name  = $first_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $first_name = $this->first_name;
        $email_verification_code = $this->email_verification_code;
        return (new MailMessage)->view('emailVerifyNotification', compact('first_name', 'email_verification_code'));
        // return (new MailMessage)
        // ->greeting('Hello! ' . $this->first_name)
        // ->line('Thank you for singing up with 2easy.cash')
        // ->line('As an extra security precaution please verify your mail by using the following Verification code')
        // ->line('Email Verification Code is.' . $this->email_verification_code)
        // ->line('Thank you for using our application!')
        // ->line('Anitra Brown');
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
            //
        ];
    }
}
