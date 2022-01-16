@extends('frontend.templates.app')
@section('title', 'Global Professional Business')

@section('content')
	<div id="main-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row mt-5 justify-content-center">
                    <div class="input-group md-form form-sm form-2 pl-0">

                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 font-weight-bold text-muted bg-white" id="">Find</span>
                        </div>
                        <form  action="{{ route('frontend.search') }}" method="GET">
                        {{-- <form  action="" method="GET"> --}}
                            <input type="text" name="find_compa" id="find_compa" placeholder="I'm looking for..."  class="form-control my-0 py-1 red-border rounded-0" aria-label="Search">
                        </form>

                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 font-weight-bold text-muted bg-white" id="">Near</span>
                        </div>
                        <input type="text" name="fint_loc" id="find_loc" placeholder="City, State, Country, Zip" class="form-control my-0 py-1 red-border" aria-label="Search">

                        <div class="input-group-append">
                            <span class="input-group-text red lighten-3 border-0" id="basic-text1">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50" style=" fill:#ffffff;">
                                <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
                            </svg>
                        </div>
                    <!-- <select class="mdb-select md-form" searchable="Search here..">
    <option value="" disabled selected>Choose your country</option>
    <option value="1">USA</option>
    <option value="2">Germany</option>
    <option value="3">France</option>
    <option value="3">Poland</option>
    <option value="3">Japan</option>
  </select> -->
                    </div>
                    <div class="banner-title">
                        <h1>DISCOVER AND REDISCOVER</h1>
                        <h2>Competitive Global Business</h2>
                    </div>
				</div>
			</div>
		</div>
		<div class="mouse-wheel">
			<img src="{{ asset('frontend/img/mouse-wheel.svg') }}" alt="">
		</div>
	</div>
	<section id="features">
		<div class="container">
			<div class="row featured-header justify-content-center">
				<div class="col-12 col-lg-10">
					<h1>FIND THE BUSINESS YOU ARE LOOKING IN AN INSTANT!</h1>
				</div>
				<div class="col-12 col-lg-10">
					<p>GPB is one of the largest online resources exclusively for small business. Delivering its products and Services to support
business owners to become the most competitive in their business, turning their businesses worldwide.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/ahorre-tiempo.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							SAVE TIME
						</h4>
						<p class="featured-description">Find the Business you are looking for in just one click.</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/mas-ingresos.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							MORE INCOME
						</h4>
						<p class="featured-description">GPB Team aims to provide online marketing services to small businesses.</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/profesionalismo.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							PROFESSIONALISM
						</h4>
						<p class="featured-description">Business owners will be able to customize and improve the online visibility and marketing of their site.</p>
					</div>
				</div>
				<div class="col-12 col-lg-3">
					<div class="featured">
						<div class="featured-img">
							<img src="{{ asset('frontend/img/confianza.svg') }}" alt="">
						</div>
						<h4 class="featured-title">
							TRUST
						</h4>
						<p class="featured-description">We count thousands of unique visitors per month.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="team">
		<div class="container">
			<div class="row featured-header justify-content-center">
				<div class="col-12 col-lg-10">
					<h1>FEATURED STAFF</h1>
                    {{-- <p> --}}
                    {{--     You can ask the question regarding the issues we will <br> --}}
                    {{--     solve that together for sure --}}
                    {{-- </p> --}}
				</div>
			</div>
			<div class="row justify-content-center">
                  <div class="col-md-12">
                      <div id="team-members" class="owl-carousel owl-theme">
                            <div class="team-member">
                              <img src="{{ asset('frontend/img/ysabel-b.jpg') }}" class="img-responsive mx-auto">
                              <div class="team-member-info text-center">
                                <h4 class="team-member-name mb-2">Isabel Bates</h4>
                                <h4 class="team-member-designation">President</h4>  
                                <p>Founder & CEO at Global Professional Business</p>
                                 {{-- <ul class="social-list"> --}}
                                 {{--    <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                 {{--    <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                 {{--    <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                 {{-- </ul> --}} 
                             
                              </div>
                            </div>
                            <div class="team-member">
                              <img src="{{ asset('frontend/img/william-d.jpg') }}" class="img-responsive mx-auto">
                              <div class="team-member-info text-center">
                                <h4 class="team-member-name mb-2">William Bates</h4>
                                <h4 class="team-member-designation">Senior VP</h4>  
                                <p>Primary objectives are to  deepen the company customer relationships</p>
                                {{-- <ul class="social-list"> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                {{-- </ul> --}} 
                              </div>
                            </div>
                            <div class="team-member">
                              <img src="{{ asset('frontend/img/karla-p.jpg') }}" class="img-responsive mx-auto">
                              <div class="team-member-info text-center">
                                <h4 class="team-member-name mb-2">Karla Bates</h4>
                                <h4 class="team-member-designation">VP Global Marketing</h4>  
                                <p>Executive management with overall responsibility for products and services</p>
                                {{-- <ul class="social-list"> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                {{-- </ul> --}} 
                                </div>
                            </div>
                            <div class="team-member">
                                <img src="{{ asset('frontend/img/estelle-e.jpg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name mb-2">Estella Bates</h4>
                                    <h4 class="team-member-designation">VP PR & Communication</h4>  
                                    <p>Develop and implement a wide range of marketing communication activities</p>
                                    {{-- <ul class="social-list"> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                    {{-- </ul> --}} 
                                </div>
                            </div>
                             <div class="team-member">
                                <img src="{{ asset('frontend/img/jake-s.jpg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name mb-2">Jake Schultz</h4>
                                    <h4 class="team-member-designation">VP Computer Science</h4>  
                                    <p>Provide support to our teams and groups on the spot</p>
                                    {{-- <ul class="social-list"> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                    {{-- </ul> --}} 
                                </div>
                            </div>
                             <div class="team-member">
                                <img src="{{ asset('frontend/img/kimberly-s.jpg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name mb-2">Kimberly Schultz</h4>
                                    <h4 class="team-member-designation">VP Civil Engineer</h4>  
                                    <p>Be in connection with other professionals in virtual network anywhere in the world</p>
                                    {{-- <ul class="social-list"> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                    {{-- </ul> --}} 
                                </div>
                            </div>
                             <div class="team-member">
                                <img src="{{ asset('frontend/img/bryan-x.png') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name mb-2">Bryan Xinzong</h4>
                                    <h4 class="team-member-designation">Business Economist</h4>  
                                    <p>Conducting, research and analysis related to GPB products</p>
                                    {{-- <ul class="social-list"> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                    {{-- </ul> --}} 
                                </div>
                            </div>
                             <div class="team-member">
                                <img src="{{ asset('frontend/img/tony2.jpg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    <h4 class="team-member-name mb-2">Tony Ojeda</h4>
                                    <h4 class="team-member-designation">Web Developer</h4>  
                                    <p>Up to date with database technology and keep website running</p>
                                    {{-- <ul class="social-list"> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li> --}}
                                    {{--     <li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li> --}}
                                    {{-- </ul> --}} 
                                </div>
                            </div>
                        </div>
                  </div>
                  
              
                {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> --}}
                {{--     <ol class="carousel-indicators"> --}}
                {{--         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> --}}
                {{--         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> --}}
                {{--         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                {{--     </ol> --}}
                {{--     <div class="carousel-inner"> --}}
                {{--         <div class="carousel-item active"> --}}
                {{--             <div class="row"> --}}
                {{--                 <div class="col"> --}}
                {{--                     <div class="d-none d-md-block"> --}}
                {{--                         <h5>...</h5> --}}
                {{--                         <p>...</p> --}}
                {{--                     </div> --}}
                {{--                 </div> --}}
                {{--                 <div class="col staff-photo"> --}}
                {{--                     <img class="d-block w-100" src="{{ asset('frontend/img/ysabel-b.jpg') }}" alt="First slide"> --}}
                {{--                 </div> --}}
                {{--             </div> --}}
                {{--         </div> --}}
                {{--         <div class="carousel-item"> --}}
                {{--             <div class="row"> --}}
                {{--                 <div class="col"></div> --}}
                {{--                 <div class="col staff-photo"> --}}
                {{--                     <img class="d-block w-100" src="{{ asset('frontend/img/william-d.jpg') }}" alt="Second slide"> --}}
                {{--                 </div> --}}
                {{--             </div> --}}
                {{--         </div> --}}
                {{--         <div class="carousel-item"> --}}
                {{--             <div class="row"> --}}
                {{--                 <div class="col"></div> --}}
                {{--                 <div class="col staff-photo"> --}}
                {{--                     <img class="d-block w-100" src="{{ asset('frontend/img/karla-p.jpg') }}" alt="Third slide"> --}}
                {{--                 </div> --}}
                {{--             </div> --}}
                {{--         </div> --}}
                {{--     </div> --}}
                {{--     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> --}}
                {{--         <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                {{--         <span class="sr-only">Previous</span> --}}
                {{--     </a> --}}
                {{--     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> --}}
                {{--         <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                {{--         <span class="sr-only">Next</span> --}}
                {{--     </a> --}}
                {{-- </div> --}}
			{{-- 	<div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/ysabel-b.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Ysabel B. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				President --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:ysabel@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
			{{-- 	<div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/william-d.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				William D. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Senior Vice-President --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:williaml@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
                {{-- <div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/karla-p.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Karla P. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Vice President, Marketing --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:karlal@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
                {{-- <div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/estelle-e.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Estelle E. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Vice President, Communications & Public Relations --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:estelle@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
                {{-- <div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/jake-s.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Jake S. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Vice President, Computer Science Engineer --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:jakel@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
                {{-- <div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/kimberly-s.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Kimberly S. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Vice President, Civil Engineer --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:kiml@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
                {{-- <div class="col-12 col-lg-3"> --}}
			{{-- 		<div class="staff"> --}}
			{{-- 			<div class="staff-photo"> --}}
                            {{-- <img src="{{ asset('frontend/img/bryan-x.png') }}" alt=""> --}}
                            {{-- <img src="{{ asset('frontend/img/kimberly-s.jpg') }}" alt=""> --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-name"> --}}
			{{-- 				Bryan X. G. --}}
			{{-- 			</div> --}}
			{{-- 			<div class="staff-job-title"> --}}
			{{-- 				Business Economist --}}
			{{-- 			</div> --}}
			{{-- 			<ul class="staff-rrss"> --}}
			{{-- 				<li> --}}
			{{-- 					<a href="mailto:bryanl@globalprofessionalbusiness.com" target="_blank"> --}}
			{{-- 						<img src="{{ asset('frontend/img/mail-negro.svg') }}" alt=""> --}}
			{{-- 					</a> --}}
			{{-- 				</li> --}}
			{{-- 			</ul> --}}
			{{-- 		</div> --}}
			{{-- 	</div> --}}
			</div>
		</div>
	</section>
    <section id="clients">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>THE MOST SUCCESSFUL COMPANIES</h1>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="owl-carousel owl-clients">
                        @foreach ($enterpriseImages as $enterprise)
                            @if ( isset( $enterprise->url_image ) )
                                <div class="item">
                                    <img src="{{ asset('storage/'.$enterprise->url_image) }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="countries">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>WE ARE CURRENTLY IN THESE COUNTRIES</h1>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="owl-carousel owl-countries">
                        {{-- @foreach ($enterprises as $enterprise)
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/peru.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        Peru
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/peru-02.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        Peru
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/usa.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        U.S.A.
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/colombia.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        Colombia
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="item"> --}}
                            {{--     <div class="countries--element"> --}}
                            {{--         <div class="element--photo"> --}}
                            {{--             <img src="{{ asset('frontend/img/china.jpg') }}" alt=""> --}}
                            {{--         </div> --}}
                            {{--         <div class="element--name"> --}}
                            {{--             China --}}
                            {{--         </div> --}}
                            {{--     </div> --}}
                            {{-- </div> --}}
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/espana.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        España
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/chile.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        Chile
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="countries--element">
                                    <div class="element--photo">
                                        <img src="{{ asset('frontend/img/mexico-02.jpg') }}" alt="">
                                    </div>
                                    <div class="element--name">
                                        México
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1>OUR CUSTOMER CAN NOT LIVE WITHOUT US</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="owl-carousel owl-testimonials">
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="item--content">
                                    {{ $testimonial->content }}
                                </div>
                                <div class="item--profile">
                                    <div class="profile--img">
                                        <img src="{{ asset('storage/'.$testimonial->portrait_image) }}" alt="">
                                    </div>
                                    <div class="profile--name">
                                        {{ $testimonial->title }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="testimonials--img">
                        <img src="{{ asset('frontend/img/testimonios.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <h1>WE ARE HAPPY TO HEAR FROM YOU</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <contact-form
                        :url="'{{ route('frontend.send_message') }}'"
                        :countries="{{ $countries }}"
                    ></contact-form>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="contact-us--company">
                        <div class="company--title">
                            Global Professional Business (GPB) Offices
                        </div>
                        <div class="company--address">
                            <p>S/N Center Dr</p>
                            <p>Irvine, CA 92618</p>
                            <p>USA</p>
                        </div>
                        <ul class="company--phones">
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">CENTRAL LINE</div>
                                    <a href="tel:+19494680112" class="phone-numer">1-949-468-0112</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">PERU - CENTRAL</div>
                                    <a href="tel:+51017073802" class="phone-numer">51-708-5720</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">SKYPE INTERNATIONAL</div>
                                    <a href="tel:+19494780844" class="phone-numer">1-949-478-0844</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('frontend/img/whatsapp.svg') }}" alt="">
                                <div class="info">
                                    <div class="label">WHATSAPP GLOBAL</div>
                                    <a href="wa.link/04lo4r" target="_blank" class="phone-numer">1-949-748-0339</a>
                                </div>
                            </li>
                        </ul>
                        <div class="company--directory">
                            <div class="company--directory-title">
                                GPB Directory:
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="directory--info">
                                    <div class="directory--title">
                                        DIRECT INFORMATION:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:info@globalprofessionalbusiness.com">info@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        CANCELLATION:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:cancellation@globalprofessionalbusiness.com">cancellation@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        CLAIM:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:claims@globalprofessionalbusiness.com">claims@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        MARKET:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:marketing@globalprofessionalbusiness.com">marketing@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        HELP/SUPPORT:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:support@globalprofessionalbusiness.com">support@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        ACCOUNTING:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:billing@globalprofessionalbusiness.com">billing@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        CHIEF EXECUTIVE:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:ceo@globalprofessionalbusiness.com">ceo@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        CAREERS:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:career@globalprofessionalbusiness.com">career@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="directory--element">
                                <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                <div class="info">
                                    <div class="directory--title">
                                        ADVERTISEMENT:
                                    </div>
                                    <div class="directory--email">
                                        <a href="mailto:ad@globalprofessionalbusiness.com">ad@globalprofessionalbusiness.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
