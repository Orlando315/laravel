<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ripples.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/glyphicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/_all-skins.min.css') }}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>
  <body id="main-body" class="hold-transition skin-red sidebar-mini">
    <div id="app" class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"></span>
          
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"> <b>{{ config('app.name', 'Laravel') }}</b> </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
  	      <!-- Sidebar toggle button-->
  	      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
              @else
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                    <span>{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                      <p>
                        Email<br>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="?ver=profile" class="btn btn-default btn-flat"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                      </div>
                      <div class="pull-right">
                        <a class="btn btn-flat btn-default" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        	Logout
                      	</a>

  	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  	                      {{ csrf_field() }}
  	                    </form>
                      </div>
                    </li>
                  </ul>
                </li>
              @endif
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
              <a href="{{ url('/') }}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Home</span>
              </a>
            </li>

            @if (!Auth::guest())
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cubes"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/products') }}"><i class="fa fa-circle-o"></i>Products</a></li>
                <li><a href="{{ url('/products/create') }}"><i class="fa fa-circle-o"></i>Add Product</a></li>
              </ul>
            </li>
            @endif

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!--Contenido TODO LO DE EL MEDIO -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1 class="text-center">
            Products
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="{{ url('/products') }}"> Products</a></li>
            @yield('breadcount')
          </ol>
        </section>
        
        @include('partials.flash')

        @yield('content')
  		</div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
      	<div class="row">
  	    	<div class="col-md-12">
  		      <div class="pull-right hidden-xs">
  		        <b>Version</b> Beta 0.7.0
  		      </div>
  		      <strong>Copyright &copy;  <a href="http://p4d.com.ve">Project 4 Design</a>.</strong>
  		    </div>
  	    </div>
      </footer>
    </div>
    <script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('div.alert').not('.alert-important').delay(5000).slideUp(300);

        $('#delModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')

          var modal = $(this)
          modal.find('#delProduct').attr("action","{{ url('/products/') }}/"+id);
        });
      })
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminLTE.min.js') }}"></script>

    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <!--Select 2-->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

    @yield('script')
  </body>
</html>
