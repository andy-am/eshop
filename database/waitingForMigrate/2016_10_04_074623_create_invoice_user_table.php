<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceUserTable extends Migration
{

    public function up()
    {
        Schema::create('invoice_user', function (Blueprint $table) {
            $table->string('user_id')->unsigned();
            $table->string('invoice_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::drop('invoice_user');
    }
}
