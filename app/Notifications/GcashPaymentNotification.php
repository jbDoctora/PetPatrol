<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class GcashPaymentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $bookingData;

    public function __construct($bookingData)
    {
        //
        $this->bookingData = $bookingData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line($this->bookingData['body'])
            ->subject($this->bookingData['subject'])
            ->action($this->bookingData['bookingStatus'], $this->bookingData['url'])
            ->line($this->bookingData['endingMessage']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // return [
        //     'booking_id' => $this->bookingData->book_id,
        //     'message' => 'Payment received via GCash RefNum: ' . $this->bookingData->gcash_refnum,
        // ];
    }

    public function toDatabase($notifiable)
    {
        //
        return [
            'book_id' => $this->bookingData['book_id'],
            'message' => $this->bookingData['message'],
        ];
    }
}
