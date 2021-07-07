<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdPartyAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_party_accesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullale();
            $table->string('name')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('agent')->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('session')->nullable();
            $table->string('code')->nullable();
            $table->string('url')->nullable();
            $table->datetime('expired')->nullable();
            $table->string('order_total')->nullable();
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
        Schema::dropIfExists('third_party_accesses');
    }
}
