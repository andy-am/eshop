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
            $table->string('url');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }


    public function down()
    {
        Schema::drop('invoices');
    }
}
