
@extends('store.store')


@section('content')

    <div class="col-sm-9 padding-right">
	
	    <h3>Pedidos de {{ Auth::user()->name }}</h3>
		
		<table class="table">
		  <tbody>
		    <tr>
			  <th>ID</th>
			  <th>Itens</th>
			  <th>Valor</th>
			  <th>Status</th>
			  
			  @foreach($orders as $order)
			  <tr>
			    <td>{{ $order->id }}</td>
			    <td>
				  <ul>
				  @foreach($order->items as $item)
				    <li>{{ $item->product->name }}</li>
				  @endforeach
				  </ul>
				</td>
			    <td>{{ $order->total }}</td>
			    <td>
				  @if ($order->status ==0)
					  Não pago
				  @else
					  Pago
				  @endif
				</td>
			  </tr>
			  @endforeach
			  
			</tr>
		  </tbody>
		</table>
	  
    </div>

@stop