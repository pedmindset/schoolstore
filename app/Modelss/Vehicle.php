<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $number
 * @property string $code
 * @property string $remarks
 * @property string $created_at
 * @property string $updated_at
 */
class Vehicle extends Model
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
    protected $fillable = ['name', 'number', 'code', 'remarks', 'created_at', 'updated_at'];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function driver()
    {
        return $this->hasOne('App\Models\Driver');
    }

}
