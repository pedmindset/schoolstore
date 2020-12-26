<?php

namespace App\Observers;

use App\Events\AccountCredited;
use App\Events\CheckoutPayment;
use App\Events\LoanAccountCredited;
use App\Events\LoanRepayment;
use App\Events\LoanRequestDenied;
use App\Events\LoanRequested;
use App\Events\LoanRequestSuccessful;
use App\Models\Transaction;

class TransactionObserver
{
     /**
     * Handle the transaction "creating" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function creating(Transaction $transaction)
    {
        $transaction->transaction_id = unique_code();
    }

    /**
     * Handle the transaction "created" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {

        //credit
        if($transaction->type == 'credit'  & $transaction->status == 'success'){
            event(new AccountCredited($transaction));
        }
        //checkout
        if($transaction->type == 'checkout'  & $transaction->status == 'success'){
            event(new CheckoutPayment($transaction));
        }
        //loan credit
        if($transaction->type == 'loan credit'  & $transaction->status == 'success'){
            event(new LoanAccountCredited($transaction));
        }
        //loan repayment
        if($transaction->type == 'loan repayment'  & $transaction->status == 'success'){
            event(new LoanRepayment($transaction));
        }
        //loan request success
        if($transaction->type == 'loan request'  & $transaction->status == 'success'){
            event(new LoanAccountCredited($transaction));
        }
        //loan request success email
        if($transaction->type == 'loan request'  & $transaction->status == 'success'){
            event(new LoanRequestSuccessful($transaction));
        }
         //loan request pending
        if($transaction->type == 'loan request'  & $transaction->status == 'pending'){
            event(new LoanRequested($transaction));
        }
         //loan request denied
        if($transaction->type == 'loan request'  & $transaction->status == 'denied'){
            event(new LoanRequestDenied($transaction));
        }
    }

    /**
     * Handle the transaction "updated" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function updated(Transaction $transaction)
    {
         //loan request successful
         if($transaction->type == 'loan request'  & $transaction->status == 'success'){
            event(new LoanRequested($transaction));
         }
         //loan request failed
         if($transaction->type == 'loan request'  & $transaction->status == 'denied'){
            event(new LoanRequestDenied($transaction));
         }
    }

    /**
     * Handle the transaction "deleted" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function deleted(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "restored" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function restored(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "force deleted" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function forceDeleted(Transaction $transaction)
    {
        //
    }
}
