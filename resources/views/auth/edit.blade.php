@extends('store.store')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Alterar Dados de Cadastro</div>
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


                            {!! Form::open(['route'=>['account.update', $usuario->id],'method'=>'put']) !!}


                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        {!! Form::text('name', $usuario->name, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">

                                        {!! Form::text('email', $usuario->email, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Endereço</label>
                                    <div class="col-md-6">
                                        {!! Form::text('endereco', $usuario->endereco, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nº</label>
                                    <div class="col-md-6">

                                        {!! Form::text('numero', $usuario->numero, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Bairro</label>
                                    <div class="col-md-6">
                                        {!! Form::text('bairro', $usuario->bairro, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">CEP</label>
                                    <div class="col-md-6">

                                        {!! Form::text('cep', $usuario->cep, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Cidade</label>
                                    <div class="col-md-6">

                                        {!! Form::text('cidade', $usuario->cidade, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Estado</label>
                                    <div class="col-md-2">
                                        <select name="estado" class="form-control">
                                            <option value="--">--</option>
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
                            <br>
                            <br>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="form-group">
                                            {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!} |
                                            <a href="{{ route('account') }}" class="=btn btn-default">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
