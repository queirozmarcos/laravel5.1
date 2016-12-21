@extends('app')

@section('content')
  <div class="container">
    <h1>Listagem de Categorias</h1>
	
	<br />
	<a href="{{ route('categories.create') }}" class="btn btn-default">Nova Caterogia</a>
	<br />
	<br />
	
	<table class="table">
	  <tr>
	    <th>Cód.</th>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Ação</th>
	  </tr>
	  
	  @foreach($categories as $category)
	  <tr>
		<td>{{ $category->id }}</td>
		<td>{{ $category->name }}</td>
		<td>{{ $category->description }}</td>
		<td>
		  <a href="{{ route('categories.edit',['id'=>$category->id]) }}">Edit</a> | 
		  <a href="{{ route('categories.destroy',['id'=>$category->id]) }}">Delete</a>
		</td>
	  </tr>
	  @endforeach
	</table>
	
	{!! $categories->render() !!}
	
  </div>
@endsection