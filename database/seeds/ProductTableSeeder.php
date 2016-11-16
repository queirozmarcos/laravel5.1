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
		
		foreach(range(1,15) as $i)
		{
			Product::create([
			  'name' => $faker->word(),
			  'description' => $faker->sentence,
			  'price' => $faker->randomNumber(2),
			  'featured' => $faker->numberBetween($min = 0, $max = 1),
			  'recommend' => $faker->numberBetween($min = 0, $max = 1),
			  'category_id' => $faker->numberBetween(1, 15)
			]);
		}
		
    }
}
