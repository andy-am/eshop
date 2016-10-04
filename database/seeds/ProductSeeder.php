<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => '1',
            'brand_id' => '1',
            'name' => 'Ford',
            'title' => 'Ford Focus',
            'description' => 'Ford focus description',
            'height' => '160',
            'width' => '170',
            'depth' => '460',
            'color' => 'Red',
            'price' => '15000',
            'dph' => '19',
            'action' => '1',
            'percentage_action' => '3',
        ]);

        DB::table('products')->insert([
            'category_id' => '1',
            'brand_id' => '2',
            'name' => 'Ford2',
            'title' => 'Ford Focus2',
            'description' => 'Ford focus description2',
            'height' => '160',
            'width' => '170',
            'depth' => '460',
            'color' => 'Purple',
            'price' => '6500',
            'dph' => '19',
            'action' => '1',
            'percentage_action' => '12',
        ]);

        DB::table('products')->insert([
            'category_id' => '1',
            'brand_id' => '2',
            'name' => 'Ford3',
            'title' => 'Ford Focus3',
            'description' => 'Ford focus description3',
            'height' => '160',
            'width' => '170',
            'depth' => '460',
            'color' => 'Silever',
            'price' => '11000',
            'dph' => '19',
            'action' => '1',
            'percentage_action' => '18',
        ]);

        DB::table('products')->insert([
            'category_id' => '1',
            'brand_id' => '2',
            'name' => 'Ford4',
            'title' => 'Ford Focus4',
            'description' => 'Ford focus description4',
            'height' => '160',
            'width' => '170',
            'depth' => '460',
            'color' => 'Green',
            'price' => '8000',
            'dph' => '19',
            'action' => '0',
            'percentage_action' => 0,
        ]);

        DB::table('products')->insert([
            'category_id' => '1',
            'brand_id' => '2',
            'name' => 'Ford5',
            'title' => 'Ford Focus5',
            'description' => 'Ford focus description5',
            'height' => '170',
            'width' => '180',
            'depth' => '470',
            'color' => 'Blue',
            'price' => '4500',
            'dph' => '19',
            'action' => '0',
            'percentage_action' => 0,
        ]);


    }
}
