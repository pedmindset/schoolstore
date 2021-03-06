<?php

namespace App\Models;

use App\Traits\QueryHelperTrait;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $featured
 * @property string $promo
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class ProductCategory extends Model implements HasMedia
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
    protected $fillable = ['name', 'description', 'featured', 'promo', 'created_at', 'updated_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('featured')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('featured');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('cover');

        $this->addMediaConversion('cover')
            ->width(672)
            ->height(310)
            ->performOnCollections('cover');
    }

    public function getCoverPhotoAttribute()
    {
        return $this->getFirstMediaUrl('cover');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
    {
        parent::boot();


        self::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }


    public function scopeFilterByType($query)
    {
        return $query->when(!empty(request()->type), function ($query) {
            $type = request()->type;
            $count = 8;
            $query->when($type == "featured", function ($query) {
                $query->whereFeatured('yes');
            })->limit($count);
        });
    }
}
