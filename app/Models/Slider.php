<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $name
 * @property string $headline
 * @property string $description
 * @property string $active
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 */
class Slider extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * @var array
     */
    protected $fillable = ['name', 'headline', 'description', 'active', 'link', 'created_at', 'updated_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaConversion('thumb')
        //     ->width(100)
        //     ->height(100)->performOnCollections('profile');

        $this->addMediaConversion('homeslider')
            ->width(1920)
            ->height(718)
            ->performOnCollections('slider');

        $this->addMediaConversion('featured')
            ->width(673)
            ->height(310)
            ->performOnCollections('profile');

        $this->addMediaConversion('section')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('profile');
    }

}
