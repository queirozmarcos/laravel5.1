<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('products')->truncate();
		
		$faker = Faker::create();
		
		factory('CodeCommerce\Product', 20)->create();
		
    }
}
