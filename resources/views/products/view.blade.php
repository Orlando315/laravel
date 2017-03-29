@extends("layouts.app")
@section('title',"Product - $product->title")

@section('breadcount')
  <li class="active">View</li>
@endsection

@section("content")
	<div class="content">
		<!-- Formulario -->
		<section>
	    <a class="btn btn-flat btn-default" href="{{ url('/products') }}"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
	    <a class="btn btn-flat btn-success" href="{{ url('/products/'.$product->id.'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit information</a>
	    <button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
		</section>

		<section class="perfil">
			<div class="row">
	    	<div class="col-md-12">
	    		<h2 class="page-header" style="margin-top:0!important">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            {{ $product->title }}
            <small class="pull-right">Registered: {{ $product->created_at }}</small>
            <span class="clearfix"></span>
          </h2>
	    	</div>
				<div class="col-md-4">
					<h4>Product details</h4>
					<p><b>Price: </b> {{ $product->price }} </p>
					<p><b>Description: </b> {{ $product->description }} </p>
				</div>
			</div>
		</section>
	</div>

	<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Delete product</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form id="delProduct" class="col-md-8 col-md-offset-2" action="#" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <h4 class="text-center">Are you sure you want to delete this product?</h4><br>

              <div class="form-group">
                <div class="progress" style="display:none">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                  </div>
                </div>
                <div class="alert" style="display:none" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>&nbsp;<span id="msj"></span></div>
              </div>
              <center>
                <button class="btn btn-flat btn-danger" type="submit">Save</button>
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Close</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection