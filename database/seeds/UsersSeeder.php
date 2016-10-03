<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 2,
            'degree_before_name' => 'Mgr.',
            'first_name' => 'Andrej',
            'last_name' => 'Májik',
            'degree_behind_name' => NULL,
            'nickname' => '7aduso7',
            'birthday' => '1989-04-10 01:31:00',
            'country' => 'Slovakia',
            'street' => 'D.Jurkoviča 2404/26',
            'zip_code' => '95501',
            'city' => 'Topoľčany',
            'phone_number' => NULL,
            'mobile_number' => '0904037790',
            'email' => 'a.majik7@gmail.com',
            'password' => bcrypt('password'),
        ]);

    }
}
