@extends('app')

@section('content')
    <div class="container">
        <h1> Editar Produto </h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
            @endif


            {!! Form::open(['route'=>['produtos.update', $produtos->id],'method'=>'put']) !!}

                    <!--Name -->
            <div class="form-group">
                {!! Form::label('category','Categorias:') !!}
                {!! Form::select('category_id', $categories, $produtos->category->id, ['class'=>'form-control']) !!}
            </div>


            <!--Name -->
            <div class="form-group">
                {!! Form::label('name','Nome:') !!}
                {!! Form::text('name', $produtos->name, ['class'=>'form-control']) !!}
            </div>

            <!--Description -->
            <div class="form-group">
                {!! Form::label('description','Descrição:') !!}
                {!! Form::textarea('description', $produtos->description, ['class'=>'form-control']) !!}
            </div>

            <!--Price -->
            <div class="form-group">
                {!! Form::label('price','Preço:') !!}
                {!! Form::text('price', $produtos->price, ['class'=>'form-control']) !!}

            </div>

           <!--  Feature | Recommend -->
           <div class="form-group">
                {!! Form::label('featured', 'Destaque:') !!}
                {!! Form::radio('featured', 1, $produtos->featured, ['class' => 'field']) !!} Sim
                {!! Form::radio('featured', 0, $produtos->featured, ['class' => 'field']) !!} Não |
                {!! Form::label('recommend', 'Recomendar:') !!}
                {!! Form::radio('recommend', 1, $produtos->recommend, ['class' => 'field']) !!} Sim
                {!! Form::radio('recommend', 0, $produtos->recommend, ['class' => 'field']) !!} Não
            </div>


            <!--  Edit Tags -->
            <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags',$produtos->tag_list,['class'=>'form-control']) !!}
            </div>


            <!--  Submit/Sair -->
            <div class="form-group">
                {!! Form::submit('Salvar Produtos', ['class'=>'btn btn-primary']) !!} |
                <a href="{{ route('produtos') }}" class="=btn btn-default">Voltar</a>
            </div>


            {!! Form::close() !!}

    </div>
@endsection
