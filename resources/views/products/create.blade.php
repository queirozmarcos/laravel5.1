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
		{!! From::label('name', 'Name:') !!}
		{!! From::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! From::label('description', 'Description:') !!}
		{!! From::textarea('description', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! From::label('price', 'Price:') !!}
		{!! From::text('price', null, ['class'=>'form-control']) !!}
	</div>
	
    <div class="form-group">
		{!! From::label('featured', 'Featured:') !!}
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
		{!! From::label('recommend', 'Recommend:') !!}
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

	<div>
	{!! From::submit('Add Product', ['class'=>'btn btn-primary']) !!}
	</div>

    {!! From::close() !!}  
	
  </div>
@endsection