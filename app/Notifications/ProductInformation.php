<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductInformation extends Notification
{
    use Queueable;
    public $query;
    /**
     * Create a new notification instance.
     */
    public function __construct($query)
    {
        $this->query = $query;
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'username' => $this->query->name,
            'email' => $this->query->email,
            'phone' => $this->query->phone,
            'address' => $this->query->address,
            'city' => $this->query->city,
            'query' => $this->query->query,
            'message' => 'New query is placed query  :- ' . $this->query->query
        ];
    }
}
