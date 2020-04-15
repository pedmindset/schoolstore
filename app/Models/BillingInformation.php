<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $payment_method
 * @property string $mobile_number
 * @property string $phone
 * @property string $phone2
 * @property string $email
 * @property string $address
 * @property string $address2
 * @property string $postcode
 * @property string $city
 * @property string $region
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 */
class BillingInformation extends Model
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
    protected $fillable = ['customer_id', 'payment_method', 'mobile_number', 'phone', 'phone2', 'email', 'address', 'address2', 'postcode', 'city', 'region', 'country', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
