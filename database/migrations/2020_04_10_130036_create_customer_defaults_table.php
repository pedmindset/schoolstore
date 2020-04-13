<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_defaults', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('customer_id')->nulllable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('account_id')->nulllable();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->decimal('amount', 13, 5)->default(0)->nullable();
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
        Schema::dropIfExists('customer_defaults');
    }
}
