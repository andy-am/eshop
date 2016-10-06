<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_street');
            $table->string('company_zip_code');
            $table->string('company_city');
            $table->string('company_country');
            $table->string('company_bank_name');
            $table->string('company_bank_account_number');
            $table->string('company_bank_code');
            $table->string('company_iban');
            $table->string('company_phone_number');
            $table->string('company_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("settings");
    }
}
