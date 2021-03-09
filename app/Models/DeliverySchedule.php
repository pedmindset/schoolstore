<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{
    // delivery_schedules => [id, school_id, driver_id, delivery_date, status]
    // delivery_schedule_orders => [delivery_schedule_id, order_id, status]
}
