<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesTable extends Migration
{

    public function up()
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });

    }


    public function down()
    {
        Schema::drop('favourites');
    }
}
