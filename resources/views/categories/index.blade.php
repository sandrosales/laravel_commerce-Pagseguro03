@extends('app')

@section('content')
    <div class="container">
        <h1> Categories </h1>

        <a href="{{ route('categorias.create') }}" class="btn btn-default">Nova Categoria</a>
        <br>
        <br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <th>{{$category->name}}</th>
                    <th>{{$category->description}}</th>
                    <th>
                       <a href="{{ route('categorias.edit', ['id'=>$category->id])}}">Edit</a> |
                        <a href="{{ route('categorias.destroy', ['id'=>$category->id])}}">Delete</a>
                    </th>
                </tr>
                @endforeach
        </table>
        {!!$categories->render()!!}
            </div>
@endsection
