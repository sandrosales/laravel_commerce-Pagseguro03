@extends('app')

@section('content')
    <div class="container">
        <h1> Upload Image </h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
            @endif

            {!! Form::open(['route'=>['produtos.images.store',$product->id], 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}

                    <!--Name -->
            <div class="form-group">
                {!! Form::label('image','Image:') !!}
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>

            <!--  Submit/Sair -->
            <div class="form-group">
                {!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}

            </div>


            {!! Form::close() !!}

    </div>
@endsection
