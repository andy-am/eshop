<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Ford',
            'codename' => 'Ford',
            'shorthand' => 'Ford Focus',
            'description' => 'Ford focus description',
        ]);
        DB::table('brands')->insert([
            'name' => 'Ford',
            'codename' => 'Ford',
            'shorthand' => 'Ford Focus',
            'description' => 'Ford focus description',
        ]);
        DB::table('brands')->insert([
            'name' => 'Ford',
            'codename' => 'Ford',
            'shorthand' => 'Ford Focus',
            'description' => 'Ford focus description',
        ]);
    }
}
