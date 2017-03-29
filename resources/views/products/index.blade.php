@extends("layouts.app")

@section('title','Products')

@section("content")
  <!-- Main content -->
  <div class="content">
    <!-- Info boxes -->
    <div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ count($products) }}</h3>
            <p>Products</p>
          </div>
          <div class="icon">
            <i class="fa fa-cubes"></i>
          </div>
          <a href="?ver=products" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div><!--row-->

    <div class="row">
    	<div class="col-md-12">
	    	<div class="box box-danger">
		      <div class="box-header with-border">
		        <h3 class="box-title"><i class="fa fa-file-text-o"></i> Products added</h3>
		        <div class="pull-right">
		          <a class="btn btn-flat btn-sm btn-success" href="{{ url('/products/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add product</a>
		        </div>
		      </div>
		      <div class="box-body">
		        <table class="table tabe-bordered">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Title</th>
									<th class="text-center">Description</th>
									<th class="text-center">Price</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i=1; @endphp
								@foreach ($products AS $d )
								<tr>
									<td class="text-center">{{ $i }}</td>
									<td class="text-center">{{ $d->title }}</td>
									<td>{{ $d->description }}</td>
									<td class="text-right">{{ $d->price }}</td>
									<td class="text-center">
										<a class="btn btn-primary btn-flat btn-sm" href="{{ url('/products/'.$d->id) }}"><i class="fa fa-search" aria-hidden="true"></i></a>
										<a class="btn btn-success btn-flat btn-sm" href="{{ url('/products/'.$d->id.'/edit') }}"><i class="fa fa-pencil" aria-hidden="tue"></i></a>
									</td>
								</tr>
								@php $i++; @endphp
								@endforeach
							</tbody>
						</table>
		      </div>
		    </div>
		  </div>
    </div>
  </div>
@endsection