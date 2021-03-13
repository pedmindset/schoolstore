<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryScheduleOrder extends Model
{
    protected $fillable = ["delivery_schedule_id", "order_id", "status"];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
