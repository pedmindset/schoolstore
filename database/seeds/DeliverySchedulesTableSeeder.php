<?php

use App\Models\DeliverySchedule;
use App\Models\DeliveryScheduleOrder;
use Illuminate\Database\Seeder;

class DeliverySchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliverySchedule::create([
            "school_id" => 1,
            "driver_id" => 3,
            "delivery_date" => now(),
        ])->orders()->saveMany([
            new DeliveryScheduleOrder([
                "order_id" => 1,

            ])
        ]);
    }
}
