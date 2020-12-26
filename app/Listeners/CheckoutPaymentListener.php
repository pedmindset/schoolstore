<?php

namespace App\Listeners;

use App\Events\CheckoutPayment;
use App\Models\Account;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckoutPaymentListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(CheckoutPayment $event)
    {
        //find account
        $account = Account::where('user_id', $event->transaction->user_id)->first();

        //debit account
        $account->balance = $account->balance - $account->transaction->amount;
        $account->save();
    }
}
