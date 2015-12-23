@extends('store.store')

@section('dados-usuarios')
    @include('store.detalhes.inf_usuario')
@stop

@section('content')
    <div class="padding-right">

        <div class="features_items">
            <div class="container">

                @yield('data')

            </div>
        </div>

    </div>
@stop