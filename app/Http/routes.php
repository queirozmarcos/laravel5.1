<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('category/{category}', function(\CodeCommerce\Category $category)
{
	return $category->name;
});

Route::get('produtos', ['as' => 'product', function()
{
	return "Produtos";
}]);

Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');

Route::pattern('category','[0-9]+');
Route::pattern('product','[0-9]+');

  Route::group(['prefix'=>'admin'], function()
  {
    Route::get('categories/{category}', ['as' => 'category', 'uses' => 'AdminCategoriesController@index']);
    Route::get('products/{product}', ['as' => 'product', 'uses' => 'AdminProductsController@index']);
  });

