
<h1>Produtos</h1>

<ul>
  @foreach($products as $product)
    <li>{{ $product->name }} - {{ $product->description }} - {{ $product->price }}</li>
  @endforeach
</ul>