<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{

    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('order_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product_id')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::drop('order_product');
    }
}
