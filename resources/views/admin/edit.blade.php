@extends('store.store')
@section('content')
    <div class="container">
        <h4>Alterar status:
            <td>
                @if($order->status == 0)
                    Aguardando pagamento
                @elseif($order->status == 1)
                    Pagamento confirmado
                @elseif($order->status == 2)
                    Enviado
                @else
                    Cancelado
                @endif
            </td>
        </h4>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['orders.update', $order->id], 'method'=>'put']) !!}
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">

                    {!! Form::label('status','Para:') !!}
                    {!! Form::select('status', $statusList, $order->status, ['class'=>'form-control']) !!}

                </div>
            </div>

        </div>
        <br>
        <div class="row">
                <div class="form-group">
                        <div class="col-md-3">
                            {!! Form::submit('Salvar Status', ['class'=>'btn btn-success']) !!}
                        <a href="{{ route('orders') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <br>
    <br>
@endsection