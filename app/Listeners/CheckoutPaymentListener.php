<?php

namespace App\Listeners;

use App\Models\Account;
use App\Events\CheckoutPayment;
use App\Models\MasterTransaction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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

        $transaction = $event->transaction;
        $transaction->status = 'success';
        $transaction->save();

        MasterTransaction::create([
            'transaction_id' => $transaction->id,
            'type' => $transaction->type,
            'status' => $transaction->status,
            'payment_method' => $transaction->payment_method,
            'amount' => $transaction->amount,
        ]);

    }
}
