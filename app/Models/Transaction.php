<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $uuid
 * @property string $transaction_id
 * @property float $amount
 * @property string $status
 * @property string $payment_method
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Receipt[] $receipts
 */
class Transaction extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'uuid', 'transaction_id', 'amount', 'status', 'payment_method', 'type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }
}
