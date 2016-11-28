@extends('app')

@section('content')
  <div class="container">
    <h1>Listagem de Produtos</h1>
	
	<br />
	<a href="{{ route('products.create') }}" class="btn btn-default">Novo Produto</a>
	<br />
	<br />
	
	<table class="table">
	  <tr>
	    <th>Cód.</th>
		<th>Nome</th>
		<th>Descrição</th>
	    <th>Preço</th>
	    <th>Disponível</th>
	    <th>Recomendado</th>
		<th>Categoria</th>
		<th>Ação</th>
	  </tr>
	  
	  @foreach($products as $product)
	  <tr>
		<td>{{ $product->id }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ str_limit($product->description, $limit=100, $end = '...') }}</td>
		<td>{{ $product->price }}</td>
		<td>
          @if ($product->featured==1)
            Sim
          @else
            Não
          @endif
		</td>
		<td>
          @if ($product->recommend==1)
            Sim
          @else
            Não
          @endif
		</td>
		<td>{{ $product->category->name }}</td>
		<td>
		  <a href="{{ route('products.edit',['id'=>$product->id]) }}">Editar</a> | 
		  <a href="{{ route('products.images',['id'=>$product->id]) }}">Foto</a> | 
		  <a href="{{ route('products.destroy',['id'=>$product->id]) }}">Apagar</a>
		</td>
	  </tr>
	  @endforeach
	</table>
	
	{!! $products->render() !!}
	
  </div>
@endsection