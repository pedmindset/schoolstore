<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

/**
* @var  string
*/
protected $table = 'options';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}