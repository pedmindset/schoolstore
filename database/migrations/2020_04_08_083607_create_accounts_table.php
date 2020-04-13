<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->uuid('uuid')->nullable();
            $table->string('name')->nullable();
            $table->decimal('balance', 13,  4)->default(0)->nullable();
            $table->decimal('limit', 13,  4)->default(0)->nullable();
            $table->decimal('credit', 13,  4)->default(0)->nullable();
            $table->integer('default_count')->default(0)->nullable();
            $table->decimal('default_amount', 13,  4)->default(0)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
