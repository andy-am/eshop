<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->default(1);
            $table->string('degree_before_name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('degree_behind_name')->nullable();
            $table->string('nickname')->unique();
            $table->timestamp('birthday');
            $table->string('country');
            $table->string('street');
            $table->string('zip_code', 5);
            $table->string('city');
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
