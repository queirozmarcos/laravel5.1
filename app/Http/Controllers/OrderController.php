<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class OrderController extends Controller
{
    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function index()
	{
		$orders = $this->orderModel->All();
		
		return view('order.index', compact('orders'));
	}
    public function update(Requests\OrderRequest $request, $id)
    {
        $status = $request->get("status");
		$this->orderModel->find($id)->update($request->all());

        return redirect()->route('order.index');
    }
}
