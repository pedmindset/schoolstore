<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $school_category_id
 * @property string $name
 * @property string $phone
 * @property string $phone2
 * @property string $address
 * @property string $address2
 * @property string $postcode
 * @property string $city
 * @property string $region
 * @property string $country
 * @property float $lng
 * @property float $lat
 * @property string $duration
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 * @property SchoolCategory $schoolCategory
 * @property Customer[] $customers
 */
class School extends Model
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
    protected $fillable = ['school_category_id', 'name', 'phone', 'phone2', 'address', 'address2', 'postcode', 'city', 'region', 'country', 'lng', 'lat', 'duration', 'start_date', 'end_date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoolCategory()
    {
        return $this->belongsTo('App\Models\SchoolCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
