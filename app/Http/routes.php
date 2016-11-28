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

Route::group(['prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function()
{
	

  Route::group(['prefix'=>'categories'], function()
  {
    Route::get('', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
    Route::post('', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
    Route::get('create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
    Route::get('{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
    Route::get('{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
    Route::put('{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
  });

  Route::group(['prefix'=>'products'], function()
  {
    Route::get('', ['as'=>'products', 'uses'=>'ProductsController@index']);
    Route::post('', ['as'=>'products.store', 'uses'=>'ProductsController@store']);
    Route::get('create', ['as'=>'products.create', 'uses'=>'ProductsController@create']);
    Route::get('{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);
    Route::get('{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
    Route::put('{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);
	
	Route::group(['prefix'=>'images'], function()
	{
		Route::get('{id}/product', ['as'=>'products.images', 'uses'=>'ProductsController@images']);
		Route::get('create/{id}/product', ['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']);
		Route::post('store/{id}/product', ['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
		Route::get('destroy/{id}/product', ['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']);
	});
  });
});


/*
Route::pattern('category','[0-9]+');
Route::pattern('product','[0-9]+');

  Route::group(['prefix'=>'admin'], function()
  {
    Route::get('categories/{category}', ['as' => 'category', 'uses' => 'AdminCategoriesController@index']);
    Route::get('products/{product}', ['as' => 'product', 'uses' => 'AdminProductsController@index']);
  });
*/

