
@extends('store.store')


@section('content')

    <div class="col-sm-9 padding-right">
	
	    <h3>Pedidos</h3>
		
		<table class="table">
		  <tbody>
		    <tr>
			  <th>ID</th>
			  <th>Usuário</th>
			  <th>Valor</th>
			  <th>Status</th>
			  
			  @foreach($orders as $order)
			  <tr>
			    <td>{{ $order->id }}</td>
			    <td>{{ $order->user->name }}</td>
			    <td>{{ $order->total }}</td>
				<td>

                {!! From::open(['route'=>['order.update', $order->id], 'method'=>'put']) !!}
                <div class="input-group" style="width: 120px">
                  {!! From::text('status', $order->status, ['class'=>'form-control']) !!}
                  <span class="input-group-btn">
                    {!! From::submit('Alterar', ['class'=>'btn btn-default']) !!}
                  </span>
                </div><!-- /input-group -->
                {!! From::close() !!}

				</td>
			  </tr>
			  @endforeach
			  
			</tr>
		  </tbody>
		</table>
	  
    </div>

@stop