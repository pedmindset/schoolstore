<?php

namespace App\Models;

use App\Traits\QueryHelperTrait;
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
    use QueryHelperTrait;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->code = strtoupper(Str::random(7));
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
    protected $fillable = ['user_id', 'code', 'uuid', 'amount', 'status', 'lng', 'lat',  'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get all of the customers dsicount
     */
    public function discounts()
    {
        return $this->morphMany('App\Models\Discount', 'discountable');
    }

    public function getAmountWithCurrencyAttribute()
    {
        return "GHS " . $this->amount;
    }
}
