
@extends('store.store')

@section('content')

  <section id="cart_items">
    <div class="container">
	  <div class="table-responsive cart_info">
	    <table class="table table-condensed">
		  <thead>
		    <tr class="cart_menu">
			  <td class="image">Item</td>
			  <td class="description">Descrição</td>
			  <td class="price">Preço</td>
			  <td class="price">Qtde.</td>
			  <td class="price">Total</td>
			</tr>
		  </thead>
		  
		  <tbody>
		  @forelse($cart->all() as $k=>$item)
		    <tr>
			  <td class="cart_product">
			    <a href="{{ route('store.product', ['id'=>$k]) }}">
				  Imagem
				</a>
			  </td>
			  <td class="cart_description">
			    <h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a></h4>
				<p>Código: {{ $k }}</p>
			  </td>
			  <td class="cart_price">
			    R$ {{ number_format($item['price'], 2, ',', '.') }}
			  </td>
			  <td class="cart_quantity">

                {!! From::open(['route'=>['store.cart.update', $k], 'method'=>'put']) !!}
                <div class="input-group" style="width: 120px">
                  {!! From::text('qtd', $item['qtd'], ['class'=>'form-control']) !!}
                  <span class="input-group-btn">
                    {!! From::submit('Alterar', ['class'=>'btn btn-default']) !!}
                  </span>
                </div><!-- /input-group -->
                {!! From::close() !!}
			  </td>
			  <td class="cart_total">
			    <p class="cart_total_price">R$ {{ number_format($item['price'] * $item['qtd'], 2, ',', '.') }}</p>
			  </td>
			  <td class="cart_delete">
			    <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Retirar</a>
			  </td>
			</tr>
		  @empty
		    <tr>
			  <td class="" colspan="5">
			    <b>Nenhum produto encontrado</b>
			  </td>
			</tr>
		  @endforelse
		  <tr class="cart_menu">
	        <td colspan="5">
			  <div class="pull-right">
			    <span style="margin-right: 2px; font-size: 1.5em">TOTAL: R$ {{ $cart->getTotal() }}</span>
				<a href="{{ route('checkout.place') }}" class="btn btn-success">Concluir Compra</a>
				
			  </div>
			</td>
	      </tr>
		  </tbody>
		</table>
	  </div>
	</div>
  </section>

@stop