<?php

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            "user_id" => 2,
            "amount" => 68,
        ])->products()->saveMany([
            new OrderProduct([
                "product_id" => 1,
                "price" => 4.00,
                "quantity" => 2,
            ]),
            new OrderProduct([
                "product_id" => 2,
                "price" => 60.00,
                "quantity" => 1,
            ]),
        ]);
    }
}
