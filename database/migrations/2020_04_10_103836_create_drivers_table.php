<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBiginteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBiginteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('drivers');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('email')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->decimal('lng', 10, 5)->nullable();
            $table->decimal('lat',  10, 5)->nullable();
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
        Schema::dropIfExists('driver');
    }
}
