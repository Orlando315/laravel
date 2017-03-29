@extends('layouts.front')

@section('title','Cart - '.config('app.name'))

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h3>Products</h3>
			@foreach($products AS $d)
				<div class="col-md-10 col-md-offset-1">
					<h3><a href="">{{ $d->title }}</a></h3>
					Qty: {{$d->qty}}
				</div>
			@endforeach
		</div>
		<div class="col-md-3">
			<h3>Summary</h3>
			Total: {{ $total }}
		</div>
	</div>
@endsection