<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $transaction_id
 * @property string $method
 * @property string $type
 * @property float $amount
 * @property string $status
 * @property string $doneBy
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class MasterTransaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['transaction_id', 'transactionID', 'method', 'type', 'amount', 'status', 'doneBy', 'created_at', 'updated_at', 'deleted_at'];

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
