<?php

namespace App\Listeners;

use App\Models\Account;
use App\Events\LoanRepayment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoanRepaymentListener
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
    public function handle(LoanRepayment $event)
    {
         //find account
         $account = Account::where('user_id', $event->transaction->user_id)->first();

         //credit account credit
         $account->credit = $account->credit - $event->transaction->amount;
         $account->save();
    }
}
