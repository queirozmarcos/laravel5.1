<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('categories')->truncate();
		
		$faker = Faker::create();
		
		factory('CodeCommerce\Category', 15)->create();
		
    }
}
