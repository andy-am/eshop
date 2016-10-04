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
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('height');
            $table->string('width');
            $table->string('depth');
            $table->string('color');
            $table->string('price');
            $table->string('dph');
            $table->boolean('action')->default(0);
            $table->boolean('percentage_action')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
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
