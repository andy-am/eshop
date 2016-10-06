<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');
            $table->integer('order_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->string('url');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::drop('invoices');
    }
}
