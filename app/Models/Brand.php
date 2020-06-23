<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $featured
 * @property string $created_at
 * @property string $updated_at
 */
class Brand extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'featured', 'created_at', 'updated_at'];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}


