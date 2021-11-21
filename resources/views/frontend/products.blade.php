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
                        <p>Getting fund by new customers starts here <br>
                        Start you free business profile to help new <br>
                        Customers find you!
                        </p>
                    </div>
                </div>                      
            </div>
            <div class="row">
                <div class="col-6 bg-active text-center my-auto" id="best">
                    <p class="h5"><b>GLOBAL PROFESSIONAL BUSINESS (GPB)</b></p>
                    <p class="text-justify">Stand out from the crowd with your free business advertising in our local, national international business direcotory. <br><br>
                    Showcase you business, stand out in search results, bring in new customers, and much more with GPB's suite of marketin services.<br><br>
                    Our GPB team are at the service of your business to help you connect with your customers online.</p>
                </div>
                <div class="col-6">
                    <img src="https://icons-for-free.com/iconfiles/png/512/business+company+estate+office+work+icon-1320086520504455343.png" id="image1">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('frontend/img/store-app.png') }}" id="image1">
                </div>
                <div class="col-6 bg-active text-center my-auto" id="best">
                    <p class="h5"><b>Attract New Customers with Your</b></p>
                    <p class="h4"><b>Free GPB Listing</b></p>
                    <p class="text-justify">Your listing appears right when people are searching for your businesses like yours on GPB search.<br><br>
                    GPB my business makes it easy to create and update your listing so you can stand out, and bring customer.</p>
                    <a class="btn btn-primary" href="/plans" role="button">Get My Free Listing</a>
                </div>
            </div>
        </div>             
    </section>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                        <p class="h2"><b>Our Product</b></p>
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
                        <p>Companies registered in premium take the
verified information of your company and send it
instantly to the whole country.</p>
                    </div>
                    
                </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-wrap text-center">
                        <div class="service-icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h3 class="text-capitalize  pb-0 mb-4">Websites</h3>
                        <p>We create your website and improve the one you
already must reach more customers!</p>
                    </div>
                    
                </div> 
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-wrap text-center">
                        <div class="service-icon">
                            {{-- <i class="fa fa-heart"></i> --}}
                            <i class="fa fa-cog"></i>
                        </div>
                        <h3 class="text-capitalize  pb-0 mb-4">SEO</h3>
                        <p>Bring in more website visitors with search engine
optimization to improve your ranking on Google</p>
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
