<?php

namespace App\Listeners;

use App\Events\MessageSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSend  $event
     * @return void
     */
    public function handle(MessageSend $event)
    {
        $contact_message = $event->message;
        Mail::send(
            'email.contact-message-confirmation', 
            ['contact_message' => $contact_message], 
            function($message) use ($contact_message) {
                $message->from('info@laravel-blog-app.com', 'Laravel 5 Blog Application');
                $message->to($contact_message->email, $contact_message->sender);
                $message->subject('We have recieved your message!');
            }
        );
    }
}
