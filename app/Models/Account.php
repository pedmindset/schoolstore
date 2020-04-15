<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $uuid
 * @property string $name
 * @property float $balance
 * @property float $limit
 * @property float $credit
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 */
class Account extends Model
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
    protected $fillable = ['customer_id', 'uuid', 'name', 'balance', 'limit', 'credit', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
