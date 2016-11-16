@extends('app')

@section('content')
  <div class="container">
    <h1>Criar nova Caterogia</h1>
	
    @if ($errors->any())
		<ul class="alert">
	      @foreach($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
	    </ul>
	@endif

    {!! From::open(['route'=>'categories.store']) !!}
	
	<div class="form-group">
		{!! From::label('name', 'Name:') !!}
		{!! From::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! From::label('description', 'Description:') !!}
		{!! From::textarea('description', null, ['class'=>'form-control']) !!}
	</div>
	
	<div>
	{!! From::submit('Add Category', ['class'=>'btn btn-primary']) !!}
	<a href="{{ route('categories') }}" class="btn btn-default">Voltar</a>
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection