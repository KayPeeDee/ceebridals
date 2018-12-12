<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('added_by')->unsigned();
            $table->string('picture');
            $table->text('caption')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();

            /*$table->foreign('added_by')
                ->references('id')->on('admins')
                ->onDelete('cascade')->onUpdate('cascade');*/

            $table->foreign('product_id')
                ->references('id')->on('products')
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
        Schema::dropIfExists('product_galleries');
    }
}
