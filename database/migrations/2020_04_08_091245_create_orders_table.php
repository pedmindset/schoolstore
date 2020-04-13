<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedbiginteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->uuid('uuid')->nullable();
            $table->decimal('amount', 13,  4)->nullable();
            $table->string('status')->nullable();
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
