<?php

namespace App\Listeners;

use App\Models\Account;
use App\Models\MasterTransaction;
use App\Events\LoanRequestSuccessful;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoanRequestSuccessfulListener
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
    public function handle(LoanRequestSuccessful $event)
    {
        //find account
        $account = Account::where('user_id', $event->transaction->user_id)->first();

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
