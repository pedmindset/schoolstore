<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $featured
 * @property string $created_at
 * @property string $updated_at
 */
class Brand extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'featured', 'created_at', 'updated_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('banner')->singleFile();
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

        $this->addMediaConversion('cover')
            ->width(672)
            ->height(310)
            ->performOnCollections('cover');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('banner');

        $this->addMediaConversion('banner')
            ->width(1370)
            ->height(385)
            ->performOnCollections('banner');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}


