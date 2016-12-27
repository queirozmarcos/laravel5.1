<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
	public function __construct()
	{
		//
	}
	
	public function place(Order $orderModel, OrderItem $orderItem)
	{
		if(!Session::has('cart'))
		{
			return false;
		}
		
		$cart = Session::get('cart');
		
		$categories = Category::all();

		if($cart->getTotal() > 0)
		{
			$order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);
			
			foreach($cart->all() as $k=>$item)
			{
				//
				//$order->items()->save($item);
				$order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
			}

			// dd($order);
			
			$cart->clear();
			
			return view('store.checkout', compact('order', 'cart', 'categories') );
		}
		
		return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
	}

}
