@extends('layouts.front')

@section('content')
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title m-b-md">
        {{ config('app.name') }}
      </div>

      <div class="links">
        <a href="#">Fashion</a>
        <a href="#">Shoes</a>
        <a href="#">For Men</a>
        <a href="#">For Woman</a>
        <a href="#">Technology</a>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($products AS $product)
      <article class="col-md-3">
        <a class="" href="{{ url('/store').'/'.$product->id }}" title="{{ $product->title }}">
          <div class="product-container">
            <div class="product-container-img">
              <img src="{{ asset('images/products/'.$product->photo) }}" alt="">
            </div>

            <h4>{{ $product->title }}</h4>
            <div class="product-pricing">
              ${{ $product->price }}
            </div>
            <div class="container-description">
              <div class="product-description">
                {{ $product->description }}
              </div>
            </div>
          </div>
        </a>
      </article>
    @endforeach
  </div>
@endsection