<h1> Categorias</h1>

<ul>

    @foreach($categories as $category)
        <li> {{ $category->name }}</li>
    @endforeach

</ul>
