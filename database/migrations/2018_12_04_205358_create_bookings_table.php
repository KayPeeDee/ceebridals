<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('item');
            $table->integer('quantity');
            $table->string('receipt_number')->nullable();
            $table->date('collection_date');
            $table->date('return_date');
            $table->double('price');
            $table->double('deposit');
            $table->double('balance');
            $table->unsignedInteger('added_by')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('added_by')
                ->references('id')->on('admins')
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
        Schema::dropIfExists('bookings');
    }
}
