<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $school_id
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
 * @property School $school
 * @property User $user
 * @property Account[] $accounts
 * @property BillingInformation[] $billingInformations
 * @property Cart[] $carts
 * @property Order[] $orders
 * @property Transaction[] $transactions
 * @property Wishlist[] $wishlists
 */
class Customer extends Model implements HasMedia
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
    protected $fillable = ['user_id', 'school_id', 'name', 'phone', 'phone2', 'email', 'address', 'address2', 'date_of_birth', 'level', 'postcode', 'city', 'region', 'country', 'lng', 'lat', 'created_at', 'updated_at', 'deleted_at'];

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
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingInformations()
    {
        return $this->hasMany('App\Models\BillingInformation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_defaults()
    {
        return $this->hasMany('App\Models\CustomerDefault');
    }

     /**
     * Get all of the post's comments.
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }


}
