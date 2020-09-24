<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDescriptionNameInProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       


        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('descirption');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->text('descirption')->nullable();
        });
    }
}
