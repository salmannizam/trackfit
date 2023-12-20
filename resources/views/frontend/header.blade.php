<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('frontend/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
		<title>Gym </title>
	</head>

	<body>

		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="{{route('home')}}">Track Fit<span></span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{ request()->is('/') ? 'active' : '' }} "><a class="nav-link" href="{{route('home')}}">Home</a></li>
						<li class="nav-item {{ request()->is('shop') ? 'active' : '' }}"><a class="nav-link " href="{{route('shop')}}">Shop</a></li>
						<li class="{{ request()->is('about-us') ? 'active' : '' }}"><a class="nav-link " href="{{route('about')}}">About us</a></li>
						<li class="{{ request()->is('service') ? 'active' : '' }}"><a class="nav-link " href="{{route('services')}}">Services</a></li>
						<li class="{{ request()->is('blog') ? 'active' : '' }}"><a class="nav-link " href="{{route('blog')}}">Blog</a></li>
						<li class="{{ request()->is('contact') ? 'active' : '' }}"><a class="nav-link " href="{{route('contact')}}">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						@if(!auth()->check())
							<li><a class="nav-link" href="{{route('login')}}"><img src="{{asset('frontend/images/user.svg')}}"></a></li>
						@endif
						
						<li><a class="nav-link" href="{{route('cart')}}"><img src="{{asset('frontend/images/cart.svg')}}"></a></li>
						@if(auth()->check())
							<li><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
						@endif

					</ul>
				</div>
			</div>
				
		</nav>