@extends('app')

@section('content')
    <div class="container">
        <h1> Create Categories </h1>
        <a href="{{ route('categorias') }}" class="=btn btn-default">Sair</a>
        <br>
        <br>
        @if ($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $errors)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
        @endif

        {!! Form::open(['route'=>'categorias.store', 'method'=>'post']) !!}

            <!--Name Form Input -->
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <!--Description Form Input -->
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('categorias') }}" class="=btn btn-default">Sair</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
