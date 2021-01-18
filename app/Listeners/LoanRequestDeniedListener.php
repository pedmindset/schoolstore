<?php

namespace App\Listeners;

use App\Models\Account;
use App\Events\LoanRequestDenied;
use App\Models\MasterTransaction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoanRequestDeniedListener
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
    public function handle(LoanRequestDenied $event)
    {
        //find account
        $account = Account::where('user_id', $event->transaction->user_id)->first();

        $transaction = $event->transaction;
        $transaction->status = 'denied';
        $transaction->save();

    }
}
