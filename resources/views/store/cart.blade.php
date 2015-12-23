@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">

                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="Descrição"></td>
                            <td class="price">Preço</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <?php
                        $product = $products->find($k);
                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $k]) }}">
                                    @if(count($product->images))
                                        <img src="{{ url('uploads/'. $product->images->first()->id .".". $product->images->first()->extension) }}" width="60" alt=""/>
                                    @else
                                        <img src="{{ url('images/no-img.jpg') }}" width="60" alt=""/>
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a> </h4>
                                <p>Código: {{$k}}</p>
                            </td>

                            <td class="cart_prince">
                                R$ {{$item['price']}}
                            </td>

                            <td class="cart_quantity">
                                <div class="form-group">
                                    <div class="input-group" style="width: 110px">
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] - 1)])}}" class="input-group-addon btn btn-default">-</a>
                                        {!! Form::text('', $item['qtd'], [
                                        'class' => 'cart_quantity_input form-control',
                                        'data-id' => $k,
                                        'data-uri' => route('cart.update', ['id' => $k]),
                                        'style' => 'text-align: center'
                                        ]) !!}
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] + 1)])}}" class="input-group-addon btn btn-default">+</a>
                                    </div>
                                </div>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{$item['price']* $item['qtd']}}</p>
                            </td>

                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id' => $k]) }}"class="cart_quantity_deçete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class=""colspan="6">
                                <p>Nenhum item no Carinho.</p>
                            </td>
                        </tr>
                    @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span style="margin-right: 90px">
                                        TOTAL: R$: {{$cart->getTotal()}}
                                    </span>
                                    <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a conta</a>
                                </div>
                            </td>
                        </tr>


                    </tbody>


                </table>

            </div>

        </div>
    </section>


@stop