<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $agent
 * @property string $last_login
 * @property string $session
 * @property string $code
 * @property string $url
 * @property string $expired
 * @property string $order_total
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class ThirdPartyAccess extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'agent', 'last_login', 'session', 'code', 'url', 'expired', 'order_total', 'created_at', 'updated_at'];

    protected $dates = ['expired'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
