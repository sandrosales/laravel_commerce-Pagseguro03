<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        /*
         *  public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, [=´çpoktfçfgnf '$user->name)->subject('Your Reminder!');
        });
    }kkkkmolpkiolo.;




         [
         */
        $user = $event->getUser();
        $order = $event->getOrder();

        Mail::send('emails.checkout', compact('user', 'order'), function($message) use ($order, $user) {

            $message->from('pedido@codecommerce.com', 'Code Commerce');
            $message->to($user->email, $user->name);
            $message->subject('Code Commerce | Seu Pedido');

        });
    }
}
