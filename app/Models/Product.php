<?php

namespace App\Models;

use App\Traits\QueryHelperTrait;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Contracts\Buyable;

/**
 * @property integer $id
 * @property integer $product_category_id
 * @property string $uuid
 * @property string $name
 * @property float $price
 * @property int $quantity
 * @property string $description
 * @property string $featured
 * @property string $code
 * @property string $barcode
 * @property string $created_at
 * @property string $updated_at
 * @property ProductCategory $productCategory
 * @property Brand $brand
 * @property Cart[] $carts
 * @property Collection[] $collections
 * @property Order[] $orders
 * @property Wishlist[] $wishlists
 */
class Product extends Model implements HasMedia, Buyable
{
    use InteractsWithMedia, QueryHelperTrait;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_category_id', 'brand_id', 'uuid', 'name', 'price', 'quantity', 'description', 'featured', 'code', 'barcode', 'created_at', 'updated_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('featured')->singleFile();
        $this->addMediaCollection('pictures');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('featured');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('pictures');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('cover');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->performOnCollections('cover');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany('App\Models\Cart');
    }


    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
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
    //  */
    // public function orders()
    // {
    //     return $this->belongsToMany('App\Models\Order');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishlists()
    {
        return $this->belongsToMany('App\Models\Wishlist');
    }

    /**
     * Get all of the customers dsicount
     */
    public function discounts()
    {
        return $this->morphMany('App\Models\Discount', 'discountable');
    }

    public static function boot()
    {
        parent::boot();


        self::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    public function getPriceWithCurrencyAttribute()
    {
        return "GHS " . $this->price;
    }

    public function getCoverPhotoAttribute()
    {
        return $this->getFirstMediaUrl('cover');
    }
    public function getPicturesAttribute()
    {
        return $this->getMedia('pictures');
    }









    // Cart
    // Start Cart mutators
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }
    public function getBuyableWeight($options = null)
    {
        return $this->weight ?? 0;
    }

    public function getCartOptionstAttribute($options = null)
    {
        return $this->options;
    }


    // Scopes
    public function scopeFilterByCategory($query)
    {
        return $query->when(!empty(request()->category_id), function ($query) {
            $query->whereProductCategoryId(request()->category_id);
        });
    }

    public function scopeFilterByKeyword($query)
    {
        return $query->when(!empty(request()->keyword), function ($query) {
            $query->where("name", "LIKE", "%" . request()->keyword . "%");
        });
    }

    public function scopeFilterByType($query)
    {
        return $query->when(!empty(request()->type), function ($query) {
            $type = request()->type;
            $count = 8;
            $query->when($type == "featured", function ($query) {
                $query->whereFeatured('yes');
            })->when($type == "new", function ($query) {
                $query->latest();
            })->when($type == "best_selling", function ($query) {
                $query->withCount('order_products')->orderBy('order_products_count', 'desc');
            })->limit($count);
        });
    }

    public function scopeOrderBySort($query)
    {
        return $query->when(!empty(request()->sort), function ($query) {
            $sort = request()->sort;
            $query->when($sort == "new", function ($query) {
                $query->latest();
            })->when($sort == "popularity", function ($query) {
                $query->withCount('order_products')->orderBy('order_products_count', 'desc');
            })->when($sort == "lowest_price", function ($query) {
                $query->orderBy("price", "asc");
            })->when($sort == "highest_price", function ($query) {
                $query->orderBy("price", "desc");
            });
        });
    }
}
