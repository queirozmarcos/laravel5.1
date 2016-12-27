
@extends('store.store')


@section('content')

    <div class="col-sm-9 padding-right">
	
	    <h3>Usuários</h3>
		
		<table class="table">
		  <tbody>
		    <tr>
			  <th>ID</th>
			  <th>Nome</th>
			  <th>e-Mail</th>
			  <th>Administrador</th>
			  
			  @foreach($users as $user)
			  <tr>
			    <td>{{ $user->id }}</td>
			    <td>{{ $user->name }}</td>
			    <td>{{ $user->email }}</td>
				<td>

                {!! From::open(['route'=>['user.update', $user->id], 'method'=>'put']) !!}
                <div class="input-group" style="width: 120px">
                  {!! From::text('is_admin', $user->is_admin, ['class'=>'form-control']) !!}
                  <span class="input-group-btn">
                    {!! From::submit('Alterar', ['class'=>'btn btn-default']) !!}
                  </span>
                </div><!-- /input-group -->
                {!! From::close() !!}

				</td>
			  </tr>
			  @endforeach
			  
			</tr>
		  </tbody>
		</table>
	  
    </div>

@stop