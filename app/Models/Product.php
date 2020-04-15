<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_category_id
 * @property string $uuid
 * @property string $name
 * @property float $price
 * @property int $quantity
 * @property string $description
 * @property string $code
 * @property string $barcode
 * @property string $created_at
 * @property string $updated_at
 * @property ProductCategory $productCategory
 * @property Cart[] $carts
 * @property Collection[] $collections
 * @property Order[] $orders
 * @property Wishlist[] $wishlists
 */
class Product extends Model
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
    protected $fillable = ['product_category_id', 'uuid', 'name', 'price', 'quantity', 'description', 'code', 'barcode', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany('App\Models\Cart');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishlists()
    {
        return $this->belongsToMany('App\Models\Wishlist');
    }
}
