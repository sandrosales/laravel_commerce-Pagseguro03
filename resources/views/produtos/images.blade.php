@extends('app')
@section('content')
    <div class="container">
        <h1> Images of {{ $product->name }}</h1>
        <a href="{{ route('produtos.images.create', ['id'=> $product->id]) }}" class="btn btn-default">Nova Imagem</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>IMAGENS</th>
                <th>EXTENÇÃO</th>
                <th>AÇÕES</th>
            </tr>

            @foreach($product->images as $image)

                <tr>
                    <td>{{$image->id}}</td>
                    <td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                    </td>
                    <td>{{$image->extension}}</td>
                    <td>
                        <a href="{{ route('produtos.images.destroy', ['id'=>$image->id]) }}">Delete</a>

                    </td>

                </tr>
            @endforeach

        </table>

        <a href="{{ route('produtos') }}" class="btn btn-default">Voltar</a>


    </div>

@endsection
