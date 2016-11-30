@extends('app')

@section('content')
  <div class="container">
    <h1>Editar Caterogia: {{ $category->name }}</h1>
	
    @if ($errors->any())
		<ul class="alert">
	      @foreach($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
	    </ul>
	@endif

    {!! From::open(['route'=>['categories.update', $category->id], 'method'=>'put']) !!}
	
	<div class="form-group">
		{!! From::label('name', 'Nome:') !!}
		{!! From::text('name', $category->name, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! From::label('description', 'Descrição:') !!}
		{!! From::textarea('description', $category->description, ['class'=>'form-control']) !!}
	</div>
	
	<div>
	{!! From::submit('Salvar Categoria', ['class'=>'btn btn-primary']) !!}
	<a href="{{ route('categories') }}" class="btn btn-default">Voltar</a>
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection