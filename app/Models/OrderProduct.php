<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ["product_id", "price", "quantity"];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
