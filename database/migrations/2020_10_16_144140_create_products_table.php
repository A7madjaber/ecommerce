<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->string('name');
            $table->longText('details');
            $table->string('product_code');
            $table->string('quantity');
            $table->string('color');
            $table->string('size');
            $table->string('price');
            $table->string('discount_price')->nullable();
            $table->string('video')->nullable();
            $table->integer('main_slider')->default(0);
            $table->integer('best_rated')->default(0);
            $table->integer('mid_slider')->nullable();

            $table->integer('hot_new')->default(0);
            $table->integer('buyone_getone')->default(0);

            $table->integer('trend')->default(0);
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->integer('status')->default(1);

            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proudcts');
    }
}
