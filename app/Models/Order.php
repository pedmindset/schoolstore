<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $uuid
 * @property float $amount
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Product[] $products
 */
class Order extends Model
{

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'uuid', 'amount', 'status', 'lng', 'lat',  'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    /**
     * Get all of the customers dsicount
     */
    public function discounts()
    {
        return $this->morphMany('App\Model\Discount', 'discountable');
    }

    public function getAmountWithCurrencyAttribute()
    {
        return "GHS " . $this->amount;
    }
}
