<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $transaction_id
 * @property string $uuid
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction $transaction
 */
class Receipt extends Model
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
    protected $fillable = ['transaction_id', 'uuid', 'code', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
