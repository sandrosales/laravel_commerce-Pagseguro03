@extends('store.conta.index')

@section('data')

    <div class="container">
        <div class="jumbotron">

            <h4>Olá, {{ Auth::user()->name }}, Seja bem vindo à sua conta!</h4>

        </div>
    </div>
@stop