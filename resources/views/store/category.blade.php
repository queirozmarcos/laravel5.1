@extends('store.store')

@section('categories')
  @include('store.categories_partial')
@stop

@section('content')


		@foreach($products as $prod)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
				    @if(count($prod->images))
                      <img src="{{ url('uploads/'.$prod->images->first()->id.'.'.$prod->images->first()->extension) }}" alt="" width="200"/>
				    @else
                      <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
				    @endif
                    <h2>R$ {{ $prod->price }}</h2>
                    <p>{{ $prod->name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{ $prod->price }}</h2>
                        <p>{{ $prod->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
		@endforeach


        </div><!--features_items-->

@stop