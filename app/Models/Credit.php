<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{

/**
* @var  string
*/
protected $table = 'credits';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
'deleted_at' => 'datetime',
];

public function user()
{
return $this->belongsTo('App\Models\User', 'user_id', 'id');
}
}