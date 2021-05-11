<!DOCTYPE html>
<html lang="es">
<head>
	<!-- General meta -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicons -->
	<link rel="icon" href="{{ asset('frontend/img/favicon.png') }}">
	<!-- Title -->
	<title>
		@yield('title')
	</title>
	<!-- SEO -->
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="copyright" content="" />
	<!-- Open Graph -->
	<meta property="og:locale" content="es_ES" />
	<meta property="og:title" content="Global Professional Business" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ url('/') }}" />
	<meta property="og:image" content="{{ asset('frontend/img/og.png') }}" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/2.1.99/css/materialdesignicons.min.css">
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/app.css?'.time()) }}">
</head>
<body>
	<header id="header" class="@yield('headerClass')">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 col-lg-2">
					<div class="logo">
                        <a href="{{ route('frontend.index') }}">
                            <img class="white" src="{{ asset('/frontend/img/logo-blanco.png') }}" alt="">
                            <img class="black" src="{{ asset('/frontend/img/logo-negro.png') }}" alt="">
                        </a>
					</div>
				</div>
				<div class="col-6 col-lg-10">
					<nav id="main-nav">
						<button class="main-nav-button" id="main-nav-button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<div class="main-nav-box">
                            @if ( Route::currentRouteName() === 'frontend.index' || Route::currentRouteName() === 'frontend.privacy_policy' || Route::currentRouteName() === 'frontend.terms_conditions' )
                                <ul class="main-nav">
                                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                    <li><a href="#features">What we do</a></li>
                                    <li><a href="#team">Featured Staff</a></li>
                                    <li><a href="#plans">Plans</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#contact-us">Contact</a></li>
                                </ul>
                                <div class="login-nav">
                                    <a href="{{ route('frontend.directory') }}" class="btn btn-red">Directory</a>
                                </div>
                            @elseif ( ( strpos(url()->current(), '/directory') !== false ) )
                                <ul class="main-nav">
                                    <li><a href="{{ route('frontend.directory') }}">Business</a></li>
                                </ul>
                            @endif

                            @if ( Route::currentRouteName() === 'frontend.login' || Route::currentRouteName() === 'frontend.register' )
                                <div class="login-nav">
                                    <a href="{{ route('frontend.login') }}" class="btn btn-outline-white">Sign in</a>
                                    <a href="{{ route('frontend.register') }}" class="btn btn-red">Sign up</a>
                                </div>
                            @elseif ( ( strpos(url()->current(), '/directory') !== false ) )
                                <div class="login-nav">
                                    <a href="{{ route('frontend.directory.register') }}" class="btn btn-outline-white">New Business</a>
                                    <a href="{{ route('frontend.directory.my_business') }}" class="btn btn-red">{{ Auth::user()->name }}</a>
                                    <a href="{{ route('admin.logout') }}" class="btn-logout">
                                        <img src="{{ asset('frontend/img/logout.svg') }}" alt="">
                                    </a>
                                </div>
                            @endif
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<main id="main" class="@yield('contentClass')">
		@yield('content')
	</main>

    @if ( Route::currentRouteName() === 'frontend.index' || Route::currentRouteName() === 'frontend.privacy_policy' || Route::currentRouteName() === 'frontend.terms_conditions' || ( strpos(url()->current(), '/directory/') !== false ) )
	<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="footer-nav">
                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                        <li><a href="#features">What we do</a></li>
                        <li><a href="#team">Featured Staff</a></li>
                        <li><a href="#plans">Plans</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#contact-us">Contact</a></li>
                    </ul>
                    <ul class="rrss-nav">
                        <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/linkedin-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/facebook-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/twitter-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/instagram-blanco.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        COPYRIGHT © 2021 Global Professional Business. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
	</footer>
    @endif

	<!-- Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @yield('scripts')
	<script src="{{ asset('/frontend/js/app.js?'.time()) }}"></script>
	<script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/custom.js?'.time()) }}"></script>

</body>
</html>