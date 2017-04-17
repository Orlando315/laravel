@extends('layouts.front')

@section('title','Create account')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h3>Create account</h3>
			<form action="{{ route('users.store') }}" method="POST">
				{{ method_field('POST') }}
					{{ csrf_field() }}
				<div class="form-group">
					<label for="name" class="control-label">Name:</label>
					<input id="name" class="form-control" type="text" name="name" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="surename" class="control-label">Surename:</label>
					<input id="surename" class="form-control" type="text" name="surename" placeholder="Surename">
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email:</label>
					<input id="email" class="form-control" type="text" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Password:</label>
					<input id="password" class="form-control" type="password" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="repeat" class="control-label">Repeat:</label>
					<input id="repeat" class="form-control" type="text" name="repeat" placeholder="Repeat password">
				</div>

				<div class="">
					<button class="btn btn-grey" type="submit">Register</button>
					<a class="btn btn-default" href="{{ route('index') }}">Cancel</a>
				</div>
			</form>
		</div>
	</div>
@endsection