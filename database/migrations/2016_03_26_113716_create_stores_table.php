<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->unique();
            $table->string('slug');
            $table->string('name');
            $table->string('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('store_categories');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

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
        Schema::drop('stores');
    }
}
