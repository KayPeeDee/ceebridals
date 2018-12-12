<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('customer_name');
            $table->string('phone');
            $table->unsignedInteger('item');
            $table->integer('quantity');
            $table->double('amount');
            $table->timestamps();

            $table->foreign('item')
                ->references('id')->on('products')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('customer_id')
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
        Schema::dropIfExists('sales');
    }
}
