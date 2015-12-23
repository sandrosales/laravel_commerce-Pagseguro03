@extends('store.store')
@section('content')
    <div class="container">
        <h1> Pedidos</h1>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>#Id</th>
                <th>Cliente</th>
                <th>Valor R$</th>
                <th>Data do Pedido</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>

            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>R$ {{ $order->total }}</td>
                    <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
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

                    <td><a href="{{ route('orders.edit', ['id' => $order->id]) }}" title="delete" class="btn btn-success btn-sm" >Alterar Status</a></td>
                </tr>
            @endforeach

        </table>

        {!!$orders->render()!!}

    </div>

@endsection
