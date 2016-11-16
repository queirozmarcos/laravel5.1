@extends('app')

@section('content')
  <div class="container">
    <h1>Editar Produto: {{ $product->name }}</h1>
	
    @if ($errors->any())
		<ul class="alert">
	      @foreach($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
	    </ul>
	@endif

    {!! From::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}
	
	<div class="form-group">
		{!! From::label('category', 'Categoria:') !!}
		{!! From::select('category_id', $categories, $product->category->id) !!}
	</div>

	<div class="form-group">
		{!! From::label('name', 'Name:') !!}
		{!! From::text('name', $product->name, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! From::label('description', 'Description:') !!}
		{!! From::textarea('description', $product->description, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! From::label('price', 'Price:') !!}
		{!! From::text('price', $product->price, ['class'=>'form-control']) !!}
	</div>
	
    <div class="form-group">
        <div class="radio">
            <label>
                {!! From::radio('featured', 1, $product->featured == 1) !!}
                Sim
            </label>
            <label>
                {!! From::radio('featured', 0, $product->featured == 0) !!}
                Não
            </label>
        </div>
    </div>
	
    <div class="form-group">
        <div class="radio">
            <label>
                {!! From::radio('recommend', 1, $product->recommend == 1) !!}
                Sim
            </label>
            <label>
                {!! From::radio('recommend', 0, $product->recommend == 0) !!}
                Não
            </label>
        </div>
    </div>
	
	<div>
	{!! From::submit('Save Product', ['class'=>'btn btn-primary']) !!}
	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection