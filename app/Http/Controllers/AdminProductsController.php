<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;

class AdminProductsController extends Controller
{

    private $products;

	public function __construct(Product $producty)
	{
		$this->products = $producty;
	}
	
	public function index()
	{
		$products = $this->products->all();

		return view('products', compact('products'));
	}
	
}