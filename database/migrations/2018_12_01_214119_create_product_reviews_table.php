<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reviewee')->unsigned()->nullable();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('comments')->nullable();
            $table->tinyInteger('favourites')->default(0);
            $table->integer('ratings')->default(0);
            $table->timestamps();

            $table->foreign('reviewee')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
