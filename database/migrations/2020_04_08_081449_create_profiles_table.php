<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('school_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('hostel_id')->nullable()->constrained()->cascadeOnDelete();
            $table->tinyInteger('has_verified_phone')->default(0);
            $table->tinyInteger('has_verified_momo')->default(0);
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('level')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->decimal('lng', 13,  5)->nullable();
            $table->decimal('lat', 13,  5)->nullable();
            $table->string('mobile_money_number')->nullable();
            $table->string('room')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
