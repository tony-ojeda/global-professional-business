<!DOCTYPE html>
<html lang="es">
<head>
	<!-- General meta -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://globalprofessionalbusiness.com" />
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
    <!-------------Font Awesome cdn files------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/app.css?'.time()) }}">
</head>
<body>
	<header id="header" class="@yield('headerClass')">
		<div class="container">
            <div class="container-fluid position-absolute text-center">
                <div class="fixed-top">
                    <p class="badge badge-warning font-weight-light">We apologize for the inconvenience, we are working hard to complete our website, we will keep everyone advised of our progress!</p>
                </div>
            </div>
			<div class="row align-items-center">
				<div class="col-6 col-lg-1">
					<div class="logo">
                        <a href="{{ route('frontend.index') }}">
                            <img class="white" src="{{ asset('/frontend/img/logo-blanco.png') }}" alt="">
                            <img class="black" src="{{ asset('/frontend/img/logo-negro.png') }}" alt="">
                        </a>
					</div>
				</div>
				<div class="col-6 col-lg-11 justify-content-end">
                    @if ( ( strpos(url()->current(), '/search') !== false ) )
                            <div class="align-self-start">
                                <div class="input-group md-form form-sm form-2 pl-5 w-75">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 font-weight-bold text-muted bg-white" id="">Find</span>
                                    </div>
                                    <form  action="{{ route('frontend.search') }}" method="GET">
                                        <input type="text" name="find_compa" id="find_compa" value="{{ request()->get('find_compa') }}" placeholder="I'm looking for..."  class="form-control my-0 py-1 red-border rounded-0" aria-label="Search">
                                    </form>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 font-weight-bold text-muted bg-white" id="">Near</span>
                                    </div>
                                    <input type="text" name="find_loca" id="find_loca" value="{{ request()->get('find_loca') }}"  placeholder="City, State, Country, Zip" class="form-control my-0 py-1 red-border" aria-label="Search">

                                    <div class="input-group-append">
                                        <span class="input-group-text red lighten-3 border-0" id="basic-text1">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50" style=" fill:#ffffff;">
                                            <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
                                        </svg>
                                    </div>
                                </div>
                        </div>
                    @endif
					<nav id="main-nav">
						<button class="main-nav-button" id="main-nav-button"></button>
						<div class="main-nav-box">
                            @if ( Route::currentRouteName() === 'frontend.index' || Route::currentRouteName() === 'frontend.privacy_policy' || 
                            Route::currentRouteName() === 'frontend.terms_conditions' || ( strpos(url()->current(), '/blog') !== false ) || 
                            ( strpos(url()->current(), '/about-us') !== false ) || ( strpos(url()->current(), '/plans') !== false ) || 
                            ( strpos(url()->current(), '/products') !== false ) || ( strpos(url()->current(), '/reviews') !== false ) || 
                            ( strpos(url()->current(), '/seo') !== false ) || ( strpos(url()->current(), '/support') !== false ) ||
                            ( strpos(url()->current(), '/careers') !== false ) || ( strpos(url()->current(), '/blog/small-marketing') !== false || 
                            ( strpos(url()->current(), '/websites') !== false) || ( strpos(url()->current(), '/advertise') !== false) ) ||
                            ( strpos(url()->current(), '/news') !== false)
                            ) 
                                <ul class="main-nav">
                                    <!--<li><a href="{{ route('frontend.index') }}">For Business</a></li>
                                    <li><a href="{{ route('frontend.index') }}/#features">What we do</a></li>
                                    <li><a href="{{ route('frontend.index') }}/#team">Featured Staff</a></li>
                                    <li><a href="{{ route('frontend.plans') }}">Plans</a></li>
                                    <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                                    <li><a href="{{ route('frontend.products') }}">Products</a></li>
                                    <li><a href="{{ route('frontend.about-us') }}">About Us</a></li>-->
                                    <li><a href="{{ route('frontend.index') }}/#contact-us">Contact</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                For Business
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('frontend.websites') }}">Web site</a>
                                                <a class="dropdown-item" href="{{ route('frontend.seo') }}">SEO</a>
                                                <a class="dropdown-item" href="{{ route('frontend.plans') }}">Pricing</a>
                                                <a class="dropdown-item" href="{{ route('frontend.products') }}">Products</a>
                                                <a class="dropdown-item" href="{{ route('frontend.advertise') }}">Advertise with us</a>
                                                <a class="dropdown-item" href="{{ route('frontend.news') }}">News</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="login-nav">
                                    @auth
                                        <a href="{{ route('frontend.directory') }}" class="btn btn-red">Directory</a>
                                    @endauth
                                    @guest
                                        <a href="{{ route('frontend.login') }}" class="btn btn-outline-white">Sign in/up</a>
                                    @endguest
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
                                    <a href="{{ route('frontend.logout') }}" class="btn btn-logout">
                                        {{-- <img src="{{ asset('frontend/img/logout.svg') }}" alt=""> --}}
                                        Logout
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

    @if ( Route::currentRouteName() === 'frontend.index' || Route::currentRouteName() === 'frontend.privacy_policy' || 
    Route::currentRouteName() === 'frontend.terms_conditions' || ( strpos(url()->current(), '/directory') !== false ) || 
    ( strpos(url()->current(), '/blog') !== false ) || ( strpos(url()->current(), '/about-us') !== false ) || 
    ( strpos(url()->current(), '/seo') !== false ) || ( strpos(url()->current(), '/support') !== false ) ||
    ( strpos(url()->current(), '/plans') !== false ) || ( strpos(url()->current(), '/products') !== false ) ||
    ( strpos(url()->current(), '/reviews') !== false ) || ( strpos(url()->current(), '/careers') !== false ) ||
    ( strpos(url()->current(), '/advertise') !== false ) || ( strpos(url()->current(), '/websites') !== false ) ||
    ( strpos(url()->current(), '/news') !== false )
    )
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-4 text-center">

                    <p class="h5"><b>GLOBAL PROFESSIONAL BUSINESS</b></p>
                    <p class="h6"><b>GPB</b></p>

                    <ul class="rrss-nav">
                        <li>
                            <a href="https://www.linkedin.com/in/isabel-bates-143600193/" target="_blank">
                                <img src="{{ asset('frontend/img/linkedin-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/GPB.Isabel" target="_blank">
                                <img src="{{ asset('frontend/img/facebook-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/twitter-blanco.svg') }}" alt="">
                            </a>
                        </li> --}}
                        <li>
                            <a href="https://www.instagram.com/ysabellbates/" target="_blank">
                                <img src="{{ asset('frontend/img/instagram-blanco.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        COPYRIGHT © 2021 Global Professional Business. All rights reserved.
                    </div>

                </div>
                <div class="col-6 col-sm-8">
                    <div class="d-flex justify-content-around">
                        <div>
                            <p class="h6"><b class="pl-3">GPB</b></p>
                            <ul class="nav footer-av flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about-us') }}">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.reviews') }}">Review</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.careers') }}">Careers</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.blog') }}">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.index') }}/#team">Featured Staff</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.index') }}/#contact-us">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <p class="h6"><b class="pl-3">For Business</b></p>
                            <ul class="nav d-flex flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.websites') }}">Website</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.seo') }}">SEO</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.plans') }}">Pricing</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.products') }}">Products</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.advertise') }}">Advertise wit us</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.support') }}">Help/Support</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.news') }}">News</a></li>
                            </ul>
                        </div>
                        <div>
                            <p class="h6"><b class="pl-3">Legal</b></p>
                            <ul class="nav d-flex flex-column">
                                <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://www.ftc.gov/news-events/press-releases/2013/03/ftc-staff-revises-online-advertising-disclosure-guidelines" target="_blank">Affiliate Link Disclosures</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!--<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="footer-nav">
                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                        <li><a href="{{ route('frontend.index') }}/#features">What we do</a></li>
                        <li><a href="{{ route('frontend.index') }}/#team">Featured Staff</a></li>
                        <li><a href="{{ route('frontend.plans') }}">Plans</a></li>
                        <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                        <li><a href="{{ route('frontend.index') }}/#contact-us">Contact</a></li>
                    </ul>
                    <ul class="footer-nav footer-nav-alt">
                        <li><a href="{{ route('frontend.privacy_policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('frontend.terms_conditions') }}">Terms and Conditions</a></li>
                    </ul>
                    <ul class="rrss-nav">
                        <li>
                            <a href="https://www.linkedin.com/in/isabel-bates-143600193/" target="_blank">
                                <img src="{{ asset('frontend/img/linkedin-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/GPB.Isabel" target="_blank">
                                <img src="{{ asset('frontend/img/facebook-blanco.svg') }}" alt="">
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/img/twitter-blanco.svg') }}" alt="">
                            </a>
                        </li> --}}
                        <li>
                            <a href="https://www.instagram.com/ysabellbates/" target="_blank">
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
    </footer>-->
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
