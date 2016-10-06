<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'company_name' => 'ITAM Company',
            'company_street' => 'STREET',
            'company_zip_code' => 'ZIP',
            'company_city' => 'CITY',
            'company_country' => 'COUNTRY',
            'company_bank_name' => 'BANK NAME',
            'company_bank_account_number' => 'BANK ACCOUNT NUMBER',
            'company_bank_code' => 'BANK CODE',
            'company_iban' => 'IBAN',
            'company_phone_number' => 'PHONE NUMBER',
            'company_email' => 'EMAIL',
        ]);
    }
}
