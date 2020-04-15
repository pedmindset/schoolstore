<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $phone
 * @property string $phone2
 * @property string $email
 * @property string $address
 * @property string $address2
 * @property string $date_of_birth
 * @property string $level
 * @property string $postcode
 * @property string $city
 * @property string $region
 * @property string $country
 * @property float $lng
 * @property float $lat
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 */
class Profile extends Model implements Transformable, HasMedia
{

    use InteractsWithMedia, TransformableTrait;

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'phone', 'phone2', 'email', 'address', 'address2', 'date_of_birth', 'level', 'postcode', 'city', 'region', 'country', 'lng', 'lat', 'created_at', 'updated_at', 'deleted_at'];

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
     * Get all of the post's comments.
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }
}
