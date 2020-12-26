<?php

namespace App\Listeners;

use App\Models\Account;
use App\Events\AccountCredited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreditedListener
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
    public function handle(AccountCredited $event)
    {
        //credit User Account
        $account = Account::where('user_id', $event->transaction->user_id)->first();
        if($account){
            $account->balance = $account->balance + $event->transaction->amount;
            $account->save();
        }else{
            $account = Account::create([
                'user_id' => $event->transaction->user_id,
                'name' => 'wallet',
                'balance' => 0,
                'credit' => 0,
                'limit' => 0,
            ]);

            $account->balance = $account->balance + $event->transaction->amount;
            $account->save();

        }
    }
}
