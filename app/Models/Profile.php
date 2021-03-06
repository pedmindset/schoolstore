<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
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
class Profile extends Model implements HasMedia
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
    protected $fillable = ['user_id', 'name', 'phone', 'phone2', 'email', 'address', 'address2', 'date_of_birth', 'level', 'postcode', 'city', 'region', 'country', 'lng', 'lat', 'created_at', 'updated_at', 'deleted_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
        $this->addMediaCollection('attachments');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('photo');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->performOnCollections('photo');

        $this->addMediaConversion('big')
            ->width(300)
            ->height(300)
            ->performOnCollections('photo');
    }

    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl('photo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the location tracking
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loanStage()
    {
        return $this->belongsTo('App\Models\LoanStage');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hostel()
    {
        return $this->belongsTo('App\Models\Hostel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school_category()
    {
        return $this->belongsTo('App\Models\SchoolCategory');
    }
}
