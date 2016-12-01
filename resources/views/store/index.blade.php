
@extends('store.store')

@section('categories')
  @include('store.categories_partial')
@stop

@section('content')

                <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>


		@foreach($featured as $feat)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
				    @if(count($feat->images))
                      <img src="{{ url('uploads/'.$feat->images->first()->id.'.'.$feat->images->first()->extension) }}" alt="" width="200"/>
				    @else
                      <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
				    @endif
                    <h2>R$ {{ $feat->price }}</h2>
                    <p>{{ $feat->name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{ $feat->price }}</h2>
                        <p>{{ $feat->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
		@endforeach


        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

		@foreach($recomend as $reco)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
				    @if(count($reco->images))
                      <img src="{{ url('uploads/'.$reco->images->first()->id.'.'.$reco->images->first()->extension) }}" alt="" width="200"/>
				    @else
                      <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
				    @endif
                    <h2>R$ {{ $reco->price }}</h2>
                    <p>{{ $reco->name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{ $reco->price }}</h2>
                        <p>{{ $reco->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
		@endforeach

        </div><!--recommended-->

    </div>

@stop