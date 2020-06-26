<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $name
 * @property string $headline
 * @property string $description
 * @property string $active
 * @property string $link
 * @property string $type
 * @property string $advert
 * @property string $created_at
 * @property string $updated_at
 */
class Banner extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * @var array
     */
    protected $fillable = ['name', 'headline', 'description', 'active', 'link', 'advert', 'type', 'created_at', 'updated_at'];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('advert')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('cover');

        $this->addMediaConversion('cover')
            ->width(1370)
            ->height(385)
            ->performOnCollections('cover');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)->performOnCollections('advert');

        $this->addMediaConversion('advert')
            ->width(295)
            ->height(446)
            ->performOnCollections('advert');
    }

}
