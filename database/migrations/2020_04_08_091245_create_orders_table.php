<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('uuid')->nullable();
            $table->decimal('amount', 13, 2)->nullable();
            $table->enum('status', ['pending', 'cancelled', 'shipped', 'delivered'])->default('pending');
            $table->decimal('lng', 13,  5)->nullable();
            $table->decimal('lat', 13,  5)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
