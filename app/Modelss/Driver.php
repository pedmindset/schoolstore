<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $vehicle_id
 * @property string $name
 * @property string $phone
 * @property string $phone2
 * @property string $address
 * @property string $address2
 * @property string $email
 * @property string $date_of_birth
 * @property float $lng
 * @property float $lat
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Driver $driver
 */
class Driver extends Model
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
    protected $fillable = ['user_id', 'vehicle_id', 'name', 'phone', 'phone2', 'address', 'address2', 'email', 'date_of_birth', 'lng', 'lat', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'vehicle_id');
    }
}
