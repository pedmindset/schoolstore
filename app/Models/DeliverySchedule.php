<?php

namespace App\Models;

use App\Traits\QueryHelperTrait;
use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{
    use QueryHelperTrait;

    protected $fillable = ["school_id", "driver_id", "delivery_date", "status"];

    public function orders()
    {
        return $this->hasMany(DeliveryScheduleOrder::class, "delivery_schedule_id");
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
