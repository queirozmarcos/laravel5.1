@extends('app')

@section('content')
  <div class="container">
    <h1>Imagens do Produto {{ $product->name }}</h1>
	
	<br />
	<a href="{{ route('products.images.create', ['id' => $product->id]) }}" class="btn btn-default">Nova Imagem</a>
	<br />
	<br />
	
	<table class="table">
	  <tr>
	    <th>Cód.</th>
		<th>Foto</th>
	    <th>Extensão</th>
		<th>Ação</th>
	  </tr>
	  
	  @foreach($product->images as $image)
	  <tr>
		<td>{{ $image->id }}</td>
		<td>
		  <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80" />
		</td>
		<td>{{ $image->extension }}</td>
		<td>
		  <a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}">Apagar</a>
		</td>
	  </tr>
	  @endforeach
	</table>
	
	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

	
  </div>
@endsection