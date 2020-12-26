<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $balance
 * @property float $credits
 * @property float $defaults
 * @property float $deposits
 * @property string $created_at
 * @property string $updated_at
 */
class MasterAccount extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['balance', 'credits', 'defaults', 'deposits', 'created_at', 'updated_at'];

}
