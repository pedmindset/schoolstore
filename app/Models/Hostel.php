<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{

/**
* @var  string
*/
protected $table = 'hostels';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function school()
{
return $this->belongsTo('App\Models\School', 'school_id', 'id');
}
}