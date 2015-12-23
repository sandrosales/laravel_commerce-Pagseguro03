@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
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
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Endereço</label>
							<div class="col-md-6">
								<input type="endereco" class="form-control" name="endereco" value="{{ old('endereco') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nº</label>
							<div class="col-md-6">
								<input type="numero" class="form-control" name="numero" value="{{ old('numero') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bairro</label>
							<div class="col-md-6">
								<input type="bairro" class="form-control" name="bairro" value="{{ old('bairro') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">CEP</label>
							<div class="col-md-6">
								<input type="cep" class="form-control" name="cep" value="{{ old('cep') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cidade</label>
							<div class="col-md-6">
								<input type="cidade" class="form-control" name="cidade" value="{{ old('ciade') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Estado</label>
							<div class="col-md-2">

								<select name="estado" class="form-control">
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AM">AM</option>
									<option value="AP">AP</option>
									<option value="BA">BA</option>
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MG">MG</option>
									<option value="MS">MS</option>
									<option value="MT">MT</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="PR">PR</option>
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RO">RO</option>
									<option value="RR">RR</option>
									<option value="RS">RS</option>
									<option value="SC">SC</option>
									<option value="SE">SE</option>
									<option value="SP">SP</option>
									<option value="TO">TO</option>
								</select>
							</div>
						</div>





						<div class="form-group">

						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
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
