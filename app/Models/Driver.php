<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

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
class Driver extends Model implements HasMedia
{
    use InteractsWithMedia;
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile');
        $this->addMediaCollection('attachments');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaConversion('thumb')
        //     ->width(100)
        //     ->height(100)->performOnCollections('profile');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->performOnCollections('profile');

        $this->addMediaConversion('big')
            ->width(300)
            ->height(300)
            ->performOnCollections('profile');
    }

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

    /**
     * Get all of the post's comments.
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }
}
