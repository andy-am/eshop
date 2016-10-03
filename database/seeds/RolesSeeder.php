<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'member',
            'codename' => 'member',
            'shorthand' => 'M',
            'description' => 'Something About Member Role'
        ]);

        DB::table('roles')->insert([
            'name' => 'super admin',
            'codename' => 'super-admin',
            'shorthand' => 'SA',
            'description' => 'Something About Super Admin Role'
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'codename' => 'admin',
            'shorthand' => 'A',
            'description' => 'Something About Admin Role'
        ]);


    }
}
