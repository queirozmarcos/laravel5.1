<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('users')->truncate();
		
		$faker = Faker::create();
		
		factory('CodeCommerce\User', 10)->create();
		
    }
}
