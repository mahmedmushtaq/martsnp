<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewOrderNotification extends Notification
{
    use Queueable;
    private $product;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        //
        $this->product = $product;

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

        $loggedInUser = Auth::user();
        return (new MailMessage)
            ->subject("New Order Received")
                    ->line('New order placed.')
                    ->line("Product Name ".$this->product->product_name)
                    ->line("Store Name ".$this->product->stores->name)
                    ->line("Customer Name: ".$loggedInUser->name."")
                    ->line("Customer Email: ".$loggedInUser->email."")
                    ->line("Customer Phone No: ".$loggedInUser->phone."")
                    ->line("Customer Address: ".$loggedInUser->address."")
                    ->line("View product details")
                    ->action('Details', url("/product/".$this->product->id."/details"))
                    ->line("Verify order by visiting Login > new orders")
                    ->action('Verify Orders ', url('/dashboard/my-orders'))

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
