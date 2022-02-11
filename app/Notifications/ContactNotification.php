<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;
    public $name;
    public $email;
    public $number;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($name, $email, $number, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->message = $message;
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
        return (new MailMessage)
            ->line('User Contact With You')
            ->line('Name: ' . $this->name)
            ->line('Email: ' . $this->email)
            ->line('Number: ' . $this->number)
            ->line('Message: ' . $this->message)
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
            //
        ];
    }
}
