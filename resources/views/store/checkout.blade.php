
@extends('store.store')

@section('categories')
  @include('store.partial.categories')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
	
	  @if($cart == 'empty')
		  <h3>Não há itens em seu carrinho.</h3>
	  @else
	    <h3>Pedido realizado com sucesso!</h3>
	  
	    <p>O pedido Nº {{ $order->id }}, foi realizado com sucesso.</p>
	  @endif

    </div>

@stop