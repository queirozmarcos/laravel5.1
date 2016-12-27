@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrar-se</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Atenção!</strong> Ocorreu um erro ao se registrar.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">e-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						
<!--                        <div class="form-group">
  						  <label class="col-md-4 control-label">Admin</label>
                          <div class="col-md-6">
                            <label>
                              {!! From::radio('is_admin', 1, null) !!}
                              Sim
                            </label>
                            <label>
                              {!! From::radio('is_admin', 0, null) !!}
                              Não
                            </label>
                          </div>
                        </div>
-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Endereço</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Número</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="number" id="number" maxlength="5">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Complemento</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="complement" id="complement">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Bairro</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="district" id="district">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cidade</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Estado</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">País</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="country" id="country">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">CEP</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cep" id="cep" maxlength="8">
                                </div>
                            </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
