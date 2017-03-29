@extends('layouts.front')

@section('title')
	{{ $product->title }}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 media store-media">
			<img src="{{ asset('images/products').'/'.$product->photo }}" alt="{{ $product->title }}">
		</div>
		<div class="col-md-6 content">
			<h1>{{ $product->title }}</h1>
			
			<h4 class="price">
				${{ $product->price }}
			</h4>
			
			<hr>
			<p> {{ $product->description }} </p>

			<form action="{{ route('in_shopping_carts.store') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="product_id" value="{{ $product->id }}">
			  <div class="select">
			    <label>Quantity</label>
			    <div class="selector-wrapper">
				    <select class="single-option-selector" name="qty">
					    <option value="1">1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
					    <option value="4">4</option>
					    <option value="5">5</option>
					    <option value="6">6</option>
					    <option value="7">7</option>
					    <option value="8">8</option>
					    <option value="9">9</option>
				    </select>
			    </div>
			  </div>
		    <hr>
		    <div id="product-add">
		      <input class="btn btn-flat btn-grey grey-outline" name="button" value="Add to Cart" type="submit" title="Add to Cart">
		    </div>
  		</form>
		</div>
	</div>
@endsection