@extends('store.store')

@section('categories')
    @include('store.detalhes.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"> <!--Detalhes do produto-->
            <div class="col-sm-5">
                <div class="view-product">

                    @if(count($product->images))
                        <img src="{{url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" height="200px" />
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" width="200px" />
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $images)
                                <a href="#"><img src="{{url('uploads/'.$images->id.'.'.$images->extension)}}" alt="" width="80"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->

                    <h2>{{$product->category->name}} : {{$product->name}}</h2>

                    <p>{{$product->description}}</p>
                                <span>
                                    <span>R$ {{number_format($product->price,2,",",".")}}</span>
                                        <a href="{{ route('cart.add',['id'=>$product->id]) }}"
                                           class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinhos
                                        </a>
                                </span>
                    <p>TAGS:
                        @foreach($product->tags as $tag)
                            <a href="{{ route('store.tag', ['id' => $tag->id]) }}" class="btn btn-default cart">{{ $tag->name }}</a>
                        @endforeach
                    </p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@stop