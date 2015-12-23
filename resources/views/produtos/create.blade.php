@extends('app')

@section('content')
    <div class="container">
        <h1> Create Produto </h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
            @endif

            {!! Form::open(['route'=>'produtos.store', 'method'=>'post']) !!}

                    <!--Name -->
            <div class="form-group">
                {!! Form::label('category','Categorias:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <!--Name -->
            <div class="form-group">
                {!! Form::label('name','Nome:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <!--Description -->
            <div class="form-group">
                {!! Form::label('description','Descrição:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>

            <!--Price -->
            <div class="form-group">
                {!! Form::label('price','Preço:') !!}
                {!! Form::text('price', null, ['class'=>'form-control']) !!}

            </div>

           <!--  Feature | Recommend -->
           <div class="form-group">
                {!! Form::label('featured', 'Destaque:') !!}
                {!! Form::radio('featured', 1, null, ['class' => 'field']) !!} Sim
                {!! Form::radio('featured', 0, null, ['class' => 'field']) !!} Não |
                {!! Form::label('recommend', 'Recomendar:') !!}
                {!! Form::radio('recommend', 1, null, ['class' => 'field']) !!} Sim
                {!! Form::radio('recommend', 0, null, ['class' => 'field']) !!} Não
            </div>

            <!--  TAGS -->
            <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags',null,['class'=>'form-control']) !!}
            </div>

            <!--  Submit/Sair -->
            <div class="form-group">
                {!! Form::submit('Adicionar Produtos', ['class'=>'btn btn-primary']) !!} |
                <a href="{{ route('produtos') }}" class="=btn btn-default">Voltar</a>
            </div>


            {!! Form::close() !!}

    </div>
@endsection
