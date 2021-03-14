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

    public static function boot()
    {
        parent::boot();

        self::updated(function ($model) {
            Order::find($model->order_id)->update(["status" => $model->status]);
        });
    }

    public function confirmDelivery()
    {
        $this->delivered_at = now();
        $this->status = "delivered";
        $this->save();
    }
}
