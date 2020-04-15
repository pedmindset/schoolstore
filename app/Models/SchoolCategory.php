<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $duration
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 * @property School[] $schools
 */
class SchoolCategory extends Model
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
    protected $fillable = ['name', 'duration', 'start_date', 'end_date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schools()
    {
        return $this->hasMany('App\Models\School');
    }
}
