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
	    <th>ID</th>
		<th>Name</th>
		<th>Description</th>
	    <th>Price</th>
	    <th>Featured</th>
	    <th>Recommend</th>
		<th>Action</th>
	  </tr>
	  
	  @foreach($products as $product)
	  <tr>
		<td>{{ $product->id }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ $product->description }}</td>
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
		<td>
		  <a href="{{ route('products.edit',['id'=>$product->id]) }}">Edit</a> | 
		  <a href="{{ route('products.destroy',['id'=>$product->id]) }}">Delete</a>
		</td>
	  </tr>
	  @endforeach
	</table>
  </div>
@endsection