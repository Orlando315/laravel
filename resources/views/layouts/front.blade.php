<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','My e-shop')</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Styles -->
    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }

      .full-height {
        height: 100vh;
      }

      .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
      }

      .position-ref {
        position: relative;
      }

      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }

      .content {
        text-align: center;
      }

      .title {
        font-size: 84px;
      }

      .links a {
        padding: 25px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
      }
      a{
        color: #636b6f !important;
        letter-spacing: .1rem;
        text-decoration: none !important;
      }

      .m-b-md {
        margin-bottom: 30px;
      }
    </style>
  </head>
  <body>
  	<div class="container">
  		<header class="row">
  			<div class="col-md-12">
	        <div class="pull-right links">
	        	<ul class="nav navbar-nav">
              <li><a href="{{ route('index') }}">Home</a></li>
              <li><a href="{{ route('cart') }}">Cart ( {{ $shopping_cart }} )</a></li>
	            @if (!Auth::check())
	              <li><a href="{{ route('login') }}">Login</a></li>
	              <li><a href="{{ route('new_user') }}">Register</a></li>
	            @else
	            	<li><a href="{{ route('account') }}">My account</a></li>
	            	<li>
	                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	                  Logout
	                </a>

	                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                    {{ csrf_field() }}
	                </form>
		            </li>
	            @endif
	          </ul>
	        </div>
	      </div>
    	</header>

      @yield('content')

	  </div>
    <footer class="front-main-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
          	Designed by
            <div class="designer">
            	<a href="http://project4design.com.ve">
            		<img src="http://www.project4design.com.ve/logos/logo-gris.png" alt="Project 4 Design">
            	</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminLTE.min.js') }}"></script>
  </body>
</html>
