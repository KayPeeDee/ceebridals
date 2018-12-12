<?php

use Illuminate\Support\Facades\Schema;
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
            $table->unsignedInteger('category')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->string('name');
            $table->double('price');
            $table->double('discounted_price')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity_in_stock')->default(0);
            /*$table->integer('size');
            $table->string('size_in_words');
            $table->string('color');*/
            $table->tinyInteger('trending')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->integer('views')->default(0);
            $table->string('main_picture')->nullable();
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
        Schema::dropIfExists('products');
    }
}
