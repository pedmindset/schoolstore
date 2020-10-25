<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('transaction_id');
            $table->unsignedbiginteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->decimal('amount', 13,  4)->nullable();
            $table->string('status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
