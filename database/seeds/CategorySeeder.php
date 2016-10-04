<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'level' => '1',
            'name' => 'Car 1',
            'title' => 'Car 1',
            'description' => 'Category desc 1',
        ]);

        DB::table('categories')->insert([
            'level' => '2',
            'name' => 'Car 2',
            'title' => 'Car 2',
            'description' => 'Category desc 2',
        ]);

        DB::table('categories')->insert([
            'level' => '1',
            'name' => 'Car 3',
            'title' => 'Car 3',
            'description' => 'Category desc 2',
        ]);
    }
}
