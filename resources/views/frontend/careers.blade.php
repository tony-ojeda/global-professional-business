@extends('frontend.templates.app')
@section('title', 'Careers | Global Professional Business')

@section('content')
    <div id="careers-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Careers</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="careers-content">
        <main>
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center">
                    <h1 class="display-6">Work with purpose <br>
                        Grow from the experience
                    </h1>

                    <div class="col-lg-6 image"  style="background-image: url('frontend/img/office.png')"></div>
                    {{-- <div class="col-lg-6 mt-5 image_two"  style="background-image: url('frontend/img/welcome_our_team.png')"></div> --}}
                </div>
            </div>
        </main>
        <section class="pt-0">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="pb-4 w-75">

                        <figure class="figure w-100 text-center">
                            <img src="{{url('frontend/img/welcome_our_team.png')}}" class="figure-img img-fluid rounded" alt="...">
                        </figure>

                        <div class="">
                            <div class="input-group md-form form-sm form-2 d-flex justify-content-start">

                                <form  action="#" method="GET">
                                    <input class="input-search form-control my-0 py-1 red-border rounded-0" type="text" placeholder="Search Job.." aria-label="Search">
                                </form>

                                <div class="input-group-append">
                                    <span class="input-group-text red lighten-3 border-0" id="basic-text1">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50" style=" fill:#ffffff;">
                                        <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <p class="text-dark font-weight-bold pt-2">Search open position</p>

                        <p class="text-dark font-weight-bold h2 pt-4">Jobs Careers</p>
                        <p class="font-weight-bold pt-2">We're a diverse team of problem solvers, join our innovate, and welcoming team, and help us empower small business owner around the world.</p>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
