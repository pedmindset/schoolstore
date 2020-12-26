<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->uuid('uuid')->nullable();
            $table->string('name')->nullable();
            $table->decimal('balance', 13,  4)->default(0)->nullable();
            $table->decimal('limit', 13,  4)->default(0)->nullable();
            $table->decimal('credit', 13,  4)->default(0)->nullable();
            $table->integer('default_count')->default(0)->nullable();
            $table->decimal('default_amount', 13,  4)->default(0)->nullable();
            $table->softDeletes();
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
