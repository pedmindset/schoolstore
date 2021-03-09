<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverySchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('driver_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamp('delivery_date')->nullable();
            $table->enum('status', ['pending', 'cancelled', 'assigned', 'delivered'])->default('pending');
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
        Schema::dropIfExists('delivery_schedules');
    }
}
