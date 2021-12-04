@extends('frontend.templates.app')
@section('title', 'Support | Global Professional Business')

@section('content')
    <div id="support-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>SUPPORT/HELP</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<section id="team" class="support-content">
		<div class="container">
			<div class="row featured-header justify-content-center">
				<div class="col-12 col-lg-10">
					<h1>Three ways to get help</h1>
				</div>
			</div>
			<div class="row justify-content-center mt-5">
                  <div class="col-md-12">
                      <div class="d-flex">
                            <div class="team-member text-center">
                              <img src="{{ asset('frontend/img/male.svg') }}" class="img-responsive mx-auto">
                              <div class="team-member-info text-center">
                                {{-- <h4 class="team-member-name mb-2">William Bates</h4> --}}
                                <h4 class="team-member-designation">Online help center</h4>  
                                <p class="text-justify">Excellent online service dedicated to small
businesses. We are here to help business owners
and get accurate answers, we solve any doubt for
you.</p>
                              </div>
                            </div>
                             <div class="team-member text-center">
                                <img src="{{ asset('frontend/img/female.svg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    {{-- <h4 class="team-member-name mb-2">Bryan Xinzong</h4> --}}
                                    <h4 class="team-member-designation">Contacts/help</h4>  
                                    <p class="text-justify">By contacting us is to help consumers discover
small businesses in your area, offering products
and services with ample opportunities business
owners we are helping you to improve the
competitiveness of your respective business, for
more information about us. We are here to
answer your questions and will generally respond
in 3 to 5 business days.</p>
                                </div>
                            </div>
                             <div class="team-member text-center">
                                <img src="{{ asset('frontend/img/tony.jpeg') }}" class="img-responsive mx-auto">
                                <div class="team-member-info text-center">
                                    {{-- <h4 class="team-member-name mb-2">Tony Ojeda</h4> --}}
                                    <h4 class="team-member-designation">Technical/help</h4>  
                                    <p class="text-justify">Find out more about any help that may have
concerned your business; we are an excellent
team to solve any technical issue related to GPB.
any questions. Fill out our support form write to
us, for help.</p>
                                </div>
                            </div>
                        </div>
                  </div>
                  
			</div>
		</div>
	</section>
    </div>
@endsection
