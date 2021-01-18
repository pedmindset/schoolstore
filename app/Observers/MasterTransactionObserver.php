<?php

namespace App\Observers;

use App\Models\MasterAccount;
use App\Models\MasterTransaction;

class MasterTransactionObserver
{

     /**
     * Handle the transaction "creating" event.
     *
     * @param  \App\Models\Transaction  $masterTransaction
     * @return void
     */
    public function creating(MasterTransaction $masterTransaction)
    {
        $masterTransaction->transactionID = unique_code();
    }

    /**
     * Handle the master account "created" event.
     *
     * @param  \App\Models\MasterTransaction  $masterTransaction
     * @return void
     */
    public function created(MasterTransaction $masterTransaction)
    {
        //deposit
        if($masterTransaction->type == 'deposit'  & $masterTransaction->status == 'success'){
            $account = MasterAccount::first();
            $account->balance = $account->balance + $masterTransaction->amount;
            $account->save();
        }

        //checkout
        if($masterTransaction->type == 'checkout'  & $masterTransaction->status == 'success'){
            $account = MasterAccount::first();
            $account->balance = $account->balance - $masterTransaction->amount;
            $account->save();
        }
        //loan credit
        if($masterTransaction->type == 'loan credit'  & $masterTransaction->status == 'success'){
            $account = MasterAccount::first();
            $account->balance = $account->balance - $masterTransaction->amount;
            $account->credit = $account->credit + $masterTransaction->amount;
            $account->save();
        }
        //loan repayment
        if($masterTransaction->type == 'loan repayment'  & $masterTransaction->status == 'success'){
            $account = MasterAccount::first();
            $account->balance = $account->balance + $masterTransaction->amount;
            $account->credit = $account->credit - $masterTransaction->amount;
            $account->save();
        }
        //loan request success
        if($masterTransaction->type == 'loan request'  & $masterTransaction->status == 'success'){
            $account = MasterAccount::first();
            $account->balance = $account->balance - $masterTransaction->amount;
            $account->credit = $account->credit + $masterTransaction->amount;
            $account->save();
        }

    }

    /**
     * Handle the master account "updated" event.
     *
     * @param  \App\Models\MasterTransaction  $masterTransaction
     * @return void
     */
    public function updated(MasterTransaction $masterTransaction)
    {
        //
    }

    /**
     * Handle the master account "deleted" event.
     *
     * @param  \App\Models\MasterTransaction  $masterTransaction
     * @return void
     */
    public function deleted(MasterTransaction $masterTransaction)
    {
        //
    }

    /**
     * Handle the master account "restored" event.
     *
     * @param  \App\Models\MasterTransaction  $masterTransaction
     * @return void
     */
    public function restored(MasterTransaction $masterTransaction)
    {
        //
    }

    /**
     * Handle the master account "force deleted" event.
     *
     * @param  \App\Models\MasterTransaction  $masterTransaction
     * @return void
     */
    public function forceDeleted(MasterTransaction $masterTransaction)
    {
        //
    }
}
