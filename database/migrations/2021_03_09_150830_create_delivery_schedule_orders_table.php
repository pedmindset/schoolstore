<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryScheduleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_schedule_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_schedule_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamp('delivered_at')->nullable();
            $table->enum('status', ['pending', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_schedule_orders');
    }
}
