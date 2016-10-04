<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->text('json_order_data');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('orders');
    }
}
