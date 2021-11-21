@extends('frontend.templates.app')
@section('title', 'SEO | Global Professional Business')

@section('content')
    <div id="seo-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>SEO</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="seo-content">
        <main>
            <div class="row position-relative">
                <div class="col-lg-6 d-flex flex-column p-5 justify-content-center align-items-center">
                    <h1 class="display-6">A great website deserves to be found.</h1>

                    <p class="text-center">Make sure Google and your
customers can find your business
online with SEO to get more traffic
on your website.</p>
                </div>
                <div class="col-lg-6 image"  style="background-image: url('frontend/img/seo.jpg')">
                        {{-- <img src="" style="max-width:100%; max-height:100%; object-fit:cover" class="figure-img img-fluid rounded" alt="..."> --}}
                        <!--<figcaption class="figure-caption">A caption for the above image.</figcaption>-->
                </div>
                <a class="btn btn-red btn-bottom-center mb-5" href="#!">Star Today</a>
            </div>
        </main>
       <section id="products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                            <p class="h2"><b>The Benefits of SEO</b></p>
                        </div>
                    </div>                      
                </div><br><br>
                <div class="row wow bounceInUp"  data-wow-duration="1.2s" data-wow-delay="1.2s">
                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <div class="service-wrap text-center p-4">
                            <p class="text-capitalize h3  pb-0 mb-4 pb-0 mb-4"><b>Increased Circulation on the Website</b></p>
                            <div class="service-icon">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <p class="h6 text-justify">SEO positioning allows engines to find you and increase your position in Google. The higher the ranking, the more people will be able to find and click on your website.</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-wrap text-center p-4">
                                <p class="text-capitalize  pb-0 mb-4"><b>Find Your Business</b></p>
                                <div class="service-icon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <p class="h6 text-justify">SEO makes your business found by your customers and the community. SEO helps your website reach your targeted audience.</p>
                            </div>
                        </div> 
                        
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-wrap text-center p-4">
                                <p class="text-capitalize  pb-0 mb-4"><b>High volumes of Lead and Call</b></p>
                                <div class="service-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                                <p class="h6 text-justify">When more customers visit your website, they can see how your company can help with what they need.</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-wrap text-center p-4">
                                <p class="text-capitalize  pb-0 mb-4"><b>Appear on the map and Local search</b></p>
                                <div class="service-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <p class="h6 text-justify">SEO ensures that your business appears on the maps of your area by local searchers. Turn into physical visitors within 24 hours.</p>
                            </div>
                        </div>
                    
                    <div class="col-12 bg-active text-center mt-5" id="best">
                        <a class="btn btn-red" href="/#contact-us" role="button">We are Happy to Hear From You</a>
                    </div>
                </div>                 
                
            </div>             
                        
        
        </section>
    </div>
@endsection
