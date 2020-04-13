<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $customer_id
 * @property integer $driver_id
 * @property integer $profile_id
 * @property string $address
 * @property float $lng
 * @property float $lat
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Driver $driver
 * @property Profile $profile
 */
class Tracking extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'driver_id', 'profile_id', 'address', 'lng', 'lat', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
