@extends('frontend.templates.app')
@section('title', 'Products | Global Professional Business')

@section('content')
	<div id="about-us-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Products</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <section class="service-area" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn">
                        <p class="h3"><b>GLOBAL PROFESSIONAL BUSINESS</b></p>
                        <p class="h4"><b>GPB</b></p>
                        <p class="mb-0">Getting new client funding starts here.</p>
                        <p>Start your business profile to help new clients to find you!</p>
                    </div>
                </div>                      
            </div>
            <div class="row">
                <div class="col-6 bg-active text-center my-auto" id="best">
                    <p class="h5"><b>WHY GPB?</b></p>
                    <p class="text-justify">It allows you to create free advertising for your business so you can
stand out from the national and local crowd. Our Directory is an
online resource for small businesses to get noticed in search results
and attract new customers.</p>
                    <p>The GPB team supports your business by helping you connect with
your customers online and become more competitive in your
respective businesses, giving you a leg up on the world.</p>

                </div>
                <div class="col-6">
                    <img src="https://icons-for-free.com/iconfiles/png/512/business+company+estate+office+work+icon-1320086520504455343.png" id="image1">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <img src="{{ asset('frontend/img/store-app.svg') }}" class="w-100" id="image1">
                </div>
                <div class="col-6 bg-active text-center my-auto" id="best">
                    <p class="h5"><b>Attract New Customers with Your</b></p>
                    <p class="h4"><b>Free Listing</b></p>
                    <p class="text-justify">Include your business for free to our small business directory, you can advertise it anywhere you are, tell the customer about your business their location and what you do, for whom they see your Ad become customers.</p>
                    <p class="text-left">Every Ad includes:</p>
                    <ul class="text-left">
                        <li>Preferred search position through GPB</li>
                        <li>Sign up Business</li>
                        <li>Create your business follow the instructions</li>
                        <li>Customize business information</li>
                        <li>Business logo and photos <br>
                            Dimensions 600X600 pixels</li>
                        <li>Business Banner and photos <br>
Dimensions 920x380 pixels</li>
                    </ul>
                    <a class="btn btn-red" href="/plans" role="button">Get My Free Listing</a>
                </div>
            </div>
        </div>             
    </section>
    <section id="products" class="mt-0 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                        <p class="h2"><b>Our Product</b></p>
                        <p>GPB has experts in digital marketing products to help your company stand out online.</p>
                    </div>
                </div>                      
            </div><br><br>
            <div class="row wow bounceInUp"  data-wow-duration="1.2s" data-wow-delay="1.2s">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-wrap text-center">
                        <div class="service-icon">
                            {{-- <i class="fa fa-leaf"></i> --}}
                            <i class="fa fa-diamond"></i>
                        </div>
                        <h3 class="text-capitalize  pb-0 mb-4 pb-0 mb-4">Listing</h3>
                        <p>Take advantage of the Premium plan, GPB per
opening your ad will fly instantly worldwide.</p>
                    </div>
                    
                </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-wrap text-center">
                        <div class="service-icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h3 class="text-capitalize  pb-0 mb-4">Websites</h3>
                        <p>We create your website and improve the one
you already have, so you can reach more
customers!</p>
                    </div>
                    
                </div> 
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-wrap text-center">
                        <div class="service-icon">
                            {{-- <i class="fa fa-heart"></i> --}}
                            <i class="fa fa-cog"></i>
                        </div>
                        <h3 class="text-capitalize  pb-0 mb-4">SEO</h3>
                        <p>Attracting more visitors to your website by the
search engine will improve your Google
ranking.</p>
                    </div>
                    
                </div>
                    
                {{-- <div class="col-md-4 col-sm-6 col-xs-12"> --}}
                {{--     <div class="service-wrap text-center"> --}}
                {{--         <div class="service-icon"> --}}
                {{--             <i class="fa fa-cogs"></i> --}}
                {{--         </div> --}}
                {{--         <h3 class="text-capitalize  pb-0 mb-4">Insurence</h3> --}}
                {{--         <p> --}}
                {{--             Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. --}}
                {{--         </p> --}}
                {{--     </div> --}}
                    
                {{-- </div> --}}
                    
                {{-- <div class="col-md-4 col-sm-6 col-xs-12"> --}}
                {{--     <div class="service-wrap text-center"> --}}
                {{--         <div class="service-icon"> --}}
                {{--             <i class="fa fa-diamond"></i> --}}
                {{--         </div> --}}
                {{--         <h3 class="text-capitalize  pb-0 mb-4">Design</h3> --}}
                {{--         <p> --}}
                {{--             Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. --}}
                {{--         </p> --}}
                {{--     </div> --}}
                    
                {{-- </div> --}}                        
                    
                {{-- <div class="col-md-4 col-sm-6 col-xs-12"> --}}
                {{--     <div class="service-wrap text-center"> --}}
                {{--         <div class="service-icon"> --}}
                {{--             <i class="fa fa-cog"></i> --}}
                {{--         </div> --}}
                {{--         <h3 class="text-capitalize  pb-0 mb-4">Web Design</h3> --}}
                {{--         <p> --}}
                {{--             Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. --}}
                {{--         </p> --}}
                {{--     </div> --}}
                    
                {{-- </div> --}}                     
                
                <div class="col-12 bg-active text-center mt-5" id="best">
                    <a class="btn btn-red" href="/#contact-us" role="button">We are Happy to Hear From You</a>
                </div>
            </div>                 
            
        </div>             
                    
    
    </section>
@endsection
