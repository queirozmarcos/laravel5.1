@extends('app')

@section('content')
  <div class="container">
    <h1>Criar novo Produto</h1>
	
    @if ($errors->any())
		<ul class="alert">
	      @foreach($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
	    </ul>
	@endif

    {!! From::open(['route'=>'products.store']) !!}
	
	<div class="form-group">
		{!! From::label('category', 'Categoria:') !!}
		{!! From::select('category_id', $categories, null) !!}
	</div>

	<div class="form-group">
		{!! From::label('name', 'Nome:') !!}
		{!! From::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! From::label('description', 'Descrição:') !!}
		{!! From::textarea('description', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! From::label('price', 'Preço:') !!}
		{!! From::text('price', null, ['class'=>'form-control']) !!}
	</div>
	
    <div class="form-group">
		{!! From::label('featured', 'Em Destaque:') !!}
        <div class="radio">
            <label>
                {!! From::radio('featured', 1, null) !!}
                Sim
            </label>
            <label>
                {!! From::radio('featured', 0, null) !!}
                Não
            </label>
        </div>
    </div>
	
    <div class="form-group">
		{!! From::label('recommend', 'Recomendado:') !!}
        <div class="radio">
            <label>
                {!! From::radio('recommend', 1, null) !!}
                Sim
            </label>
            <label>
                {!! From::radio('recommend', 0, null) !!}
                Não
            </label>
        </div>
    </div>

	<div class="form-group">
		{!! From::label('tags', 'Tags (separadas por vírgula ","):') !!}
		{!! From::textarea('tags', null, ['class'=>'form-control']) !!}
	</div>
	
	<div>
	{!! From::submit('Gravar Produto', ['class'=>'btn btn-primary']) !!}
	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection