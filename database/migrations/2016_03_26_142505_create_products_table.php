<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->unique();
            $table->string('name');
            $table->string('background_color')->nullable();
            $table->string('font_color')->nullable();
            $table->decimal('price', 6, 2);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('product_categories');

            // $table->integer('store_id')->unsigned();
            // $table->foreign('store_id')->references('id')->on('stores');

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::drop('products');
    }
}
