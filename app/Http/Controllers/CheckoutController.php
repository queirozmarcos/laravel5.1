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
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
	public function __construct()
	{
		//
	}
	
	public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
	{
		if(!Session::has('cart'))
		{
			return false;
		}
		
		$cart = Session::get('cart');
		
		$categories = Category::all();

		if($cart->getTotal() > 0)
		{
			$checkout = $checkoutService->createCheckoutBuilder();
			
			$order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);
			
			foreach($cart->all() as $k=>$item)
			{
				//
				//$order->items()->save($item);
				$checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, ".", ""), $item['qtd']));
				$order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
			}

			// dd($order);
			
			$cart->clear();
			
			$response = $checkoutService->checkout($checkout->getCheckout());
			
			return redirect($response->getRedirectionUrl());
			
//			return view('store.checkout', compact('order', 'cart', 'categories') );
		}
		
		return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
	}
	
//	public function test(CheckoutService $checkoutService)
//	{
//        $checkout = $checkoutService->createCheckoutBuilder()
//            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
//            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
//            ->getCheckout();

//        $response = $checkoutService->checkout($checkout);

//        return redirect($response->getRedirectionUrl());
//	}

}
