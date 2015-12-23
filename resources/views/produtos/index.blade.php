@extends('app')
@section('content')
    <div class="container">
        <h1> Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-default">Novo Produto</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>PREÇO</th>
                <th>CATEGORIA</th>
                <th>DESTAQUE</th>
                <th>RECOMENDAR</th>
                <th>AÇÕES</th>
            </tr>

            @foreach($produtos as $product)

                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{str_limit($product->description, $limit = 100, $end = '...')}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <small>{{($product->featured)?'Sim':'Não'}}</small>
                    </td>
                    <td>
                        <small>{{($product->recommend)?'Sim':'Não'}}</small>
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', ['id'=>$product->id]) }}"\ class="btn btn-success">Editar</a>
                        <a href="{{ route('produtos.images', ['id'=>$product->id]) }}"\ class="btn btn-success">Image</a>
                        <a href="{{ route('produtos.destroy', ['id'=>$product->id]) }}" class="btn btn-danger">Delete</a>

                    </td>

                </tr>
            @endforeach

        </table>
        {!!$produtos->render()!!}


    </div>

@endsection
