@extends('app')

@section('content')
  <div class="container">
    <h1>Upload nova Imagem</h1>
	
    @if ($errors->any())
		<ul class="alert">
	      @foreach($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
	    </ul>
	@endif

    {!! From::open(['route'=>['products.images.store', $product->id], 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
	
	<div class="form-group">
		{!! From::label('image', 'Foto:') !!}
		{!! From::file('image', null, ['class'=>'form-control']) !!}
	</div>

	<div>
	{!! From::submit('Carregar foto', ['class'=>'btn btn-primary']) !!}
	<a href="{{ route('products.images', ['id' => $product->id]) }}" class="btn btn-default">Voltar</a>
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection