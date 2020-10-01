<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property float $percentage
 * @property float $amount
 * @property int $usage
 * @property string $discountable_type
 * @property integer $discountable_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Discount extends Model
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
    protected $fillable = ['name', 'description', 'code', 'percentage', 'amount', 'usage', 'discountable_type', 'discountable_id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function discountable()
    {
        return $this->morphTo();
    }

}
