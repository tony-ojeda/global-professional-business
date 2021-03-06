@extends('frontend.templates.app')
@section('title', 'Plans | Global Professional Business')

@section('content')
	<div id="about-us-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Plans</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <section id="plans">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>Promotional Prices</h1>
                </div>
				<div class="col-md-9 col-lg-9 mb-3">
					<p style="text-align: center">OPENING PRICES ARE SUBJECT TO CHANGE UNTIL FURTHER NOTICE, EXCEPT FOR THE PREMIUM PLAN. HOWEVER, IF PREMIUM PLAN IS CANCELED, WILL BE SUBJECT TO CURRENT PRICES, EACH ONE WILL NOTIFIED BY E-MAIL FOR ANY PRICE CHANGE.</p>
				</div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-free">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Free
                            </div>
                            <div class="plan--header-price">

                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>1 month free</li>
                                <li>Publish your business for 1 month for free</li>
                                <li class="disabled">Your business in the first searches</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-basic">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Basic
                            </div>
                            <div class="plan--header-price">
                                $25
                                <small>monthly</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publish your business for 1 month for free</li>
                                <li class="disabled" style="color: #1d1c1c">Your business in the first searches</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-premium">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Premium
                            </div>
                            <div class="plan--header-price">
                                $200
                                <small>annual</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publish your business for 1 month for free</li>
                                <li>Your business in the first searches</li>
                            </ul>
                        </div>
                        <div class="plan--cta">
                            <a href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
