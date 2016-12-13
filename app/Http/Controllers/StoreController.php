<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    public function index()
	{
		$featured = Product::featured()->get();
		$recomend = Product::recommend()->get();
		
		$categories = Category::all();
		
		return view('store.index', compact('categories', 'featured', 'recomend'));
	}

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
		//dd($products);
        return view('store.category', compact('categories', 'products', 'category'));
    }
	
	public function tag($id)
	{
		$categories = Category::all();
		$tag = Tag::find($id);
		$products = $tag->products;
		
		return view('store.tag', compact('categories', 'products', 'tag'));
		
	}
}
