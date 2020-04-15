<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property float $fee
 * @property string $api_url
 * @property string $api_key
 * @property string $api_secret
 * @property string $api_merchant
 * @property string $api_other
 * @property string $created_at
 * @property string $updated_at
 */
class PaymentMethod extends Model
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
    protected $fillable = ['name', 'fee', 'api_url', 'api_key', 'api_secret', 'api_merchant', 'api_other', 'created_at', 'updated_at'];

}
