<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function recentOrders()
    {
        return $this->orders()->latest()->whereUserId(auth()->id())->limit(5)->get();
    }

    public function guarantors()
    {
        return $this->belongsToMany(Guarantor::class);
    }

     


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function account()
    {
        return $this->hasOne('App\Models\Account');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingInformation()
    {
        return $this->hasOne('App\Models\BillingInformation');
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
     * Get all of the location tracking
     */
    public function trackings()
    {
        return $this->morphMany('App\Model\Tracking', 'trackable');
    }

    /**
     * Get all of the customers dsicount
     */
    public function discounts()
    {
        return $this->morphMany('App\Model\Discount', 'discountable');
    }
}
