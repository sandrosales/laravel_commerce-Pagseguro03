<h1> Produtos</h1>
<ul>
    @foreach($produtos as $product)
        <li> {{$product->name}}</li>

    @endforeach

</ul>
