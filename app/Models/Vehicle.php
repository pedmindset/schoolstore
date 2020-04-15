<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property integer $id
 * @property string $name
 * @property string $number
 * @property string $code
 * @property string $remarks
 * @property string $created_at
 * @property string $updated_at
 */
class Vehicle extends Model implements HasMedia
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
    protected $fillable = ['name', 'number', 'code', 'remarks', 'created_at', 'updated_at'];

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

        $this->addMediaConversion('meduim')
            ->width(300)
            ->height(300)
            ->performOnCollections('profile');

        $this->addMediaConversion('big')
            ->width(600)
            ->height(600)
            ->performOnCollections('profile');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function driver()
    {
        return $this->hasOne('App\Models\Driver');
    }

    /**
     * Get all of the post's comments.
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }

}
