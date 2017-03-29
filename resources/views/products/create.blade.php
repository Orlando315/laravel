@extends("layouts.app")
@section('title', "Product - $title")

@section('breadcount')
  <li class="active">{{$title}}</li>
@endsection

@section('content')

	<div class="content">
		<!-- Formulario -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form class="" action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
					{{ method_field( $method ) }}
					{{ csrf_field() }}
					<h4>{{ $title }} Product</h4>
					<div class="form-group">
            <div class="imageUploadWidget">
              <div class="imageArea">
                <img id="img" src="{{ asset('/images') }}{{isset($product->photo) ? '/products/'.$product->photo : '/no-image.png' }}" alt="">
                <img class="spinner-image" src="{{ asset('images/spinner.gif') }}">
              </div>
              <div class="btnArea">
                <input id='file' name='image' accept='image/jpeg,image/png' type='file'>
              </div>
            </div>
          </div>

					<div class="form-group">
						<label class="control-label" for="title">Title:</label>
						<input id="title" class="form-control" type="text" name="title" value="{{ old('title')?old('title'):$product->title }}" placeholder="Title">
					</div>

					<div class="form-group {{ $errors->has('stock')?'has-error':'' }}">
						<label class="control-label" for="stock">Stock:</label>
						<input id="stock" class="form-control" type="number" name="stock" value="{{ old('stock')?old('stock'):$product->stock }}" placeholder="0">
					</div>
					
					<div class="form-group">
						<label class="control-label" for="price">Price:</label>
						<input id="price" class="form-control" type="number" name="price" value="{{ old('price')?old('price'):$product->price }}" placeholder="0.00">
					</div>

					<div class="form-group">
						<textarea id="description" class="form-control" name="description" placeholder="Description">{{ old('description')?old('description'):$product->description }}</textarea>
					</div>

					@if(count($errors)>0)
						<div class="alert alert-danger">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        <strong class="text-center">You most complete all required fields</strong> 
			    	</div>
					@endif

					<div class="form-group text-right">
						<a class="btn btn-flat btn-default" href="{{url('/products')}}"><i class="fa fa-reply"></i> Back</a>
						<button class="btn btn-flat btn-primary" type="submit"><i class="fa fa-send"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			console.log("script cargado");
			$('#file').change(preview);	
		});
		
		function preview(){
	    //Id del input
	    var input = this.id;
	    //El archivo
	    var file  = this.files[0];
	    //Tippo de archivo
	    var type  = file.type;
	    //Contar errores
	    var error = 0;
	    //Imagen
	    var img   = $('#img');
	    //Imagen anterior
	    var prev  = img.attr("src");
	    //Imagen loading
	    var load = $(".spinner-image");
	    //Guardar imagen anterior
	    img.attr('prev',prev);
	    //Ocultar imagen
	    img.hide();
	    //Mostar cargando
	    load.show();
	    if(file){
	      if(file.size<2000000){
	        if(type == "image/jpeg" || type == "image/png" || type == "image/jpg"){
	          var reader = new FileReader();
	          reader.onload = function (e) {
	            img.attr('src', e.target.result);
	            load.hide();
	          img.show('slow');
	          }
	          reader.readAsDataURL(file);
	        }else{ $('#msj').html('Archivo no admitido.'); error++; }
	      }else{ $('#msj').html('La imagen supera el tamaño permitido: 2MB.'); error++; }
	    }

	    if(error>0){
	      img.parent().parent().addClass('has-error');
	      $('#'+input).val('');
	      $('.alert').removeClass('alert-success').addClass("alert-danger");
	      $('.alert').show().delay(7000).hide('slow');
	      load.hide();
	    }else{ img.parent().parent().removeClass('error'); }
	  }//Preview-----------------------------------------------------------------------------------
	</script>
@endsection