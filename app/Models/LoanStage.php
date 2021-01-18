<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanStage extends Model
{

/**
* @var  string
*/
protected $table = 'loan_stages';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}