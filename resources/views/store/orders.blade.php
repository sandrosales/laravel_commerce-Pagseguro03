@extends('store.conta.index')
@section('content')
    <div class="container">
        <br>
            <br>
            <table class="table">
                <tr>
                    <th>#Id</th>
                    <th>Itens</th>
                    <th>Data</th>
                    <th>Valor R$</th>
                    <th>Status</th>
                </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>
                                    {{$item->product->name}}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                    <td>{{$order->total}}</td>
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
                </tr>
            @endforeach
        </table>

    </div>
@stop