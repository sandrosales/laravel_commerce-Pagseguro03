@extends('app')

@section('content')
    <div class="container">
        <h1> Editando  Categories: {{$category->name}} </h1>
        @if ($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $errors)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
        @endif

        {!! Form::open(['route'=>['categorias.update', $category->id],'method'=>'put']) !!}

            <!--Name Form Input -->
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>

            <!--Description Form Input -->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Salvar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>
@endsection
