<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property integer $id
 * @property string $name
 * @property string $descirption
 * @property string $featured
 * @property string $promo
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class ProductCategory extends Model implements HasMedia
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
    protected $fillable = ['name', 'descirption', 'featured', 'promo', 'created_at', 'updated_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
