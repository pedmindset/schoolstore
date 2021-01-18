<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_stages', function (Blueprint $table) {
            $table->id('id');
            $table->decimal('amount', 13, 2)->nullable();
            $table->string('stage')->nullable();
            $table->string('defualt')->nullable();
            $table->decimal('interest_rate', 13, 2)->nullable();
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
        Schema::dropIfExists('loan_stages');
    }
}
