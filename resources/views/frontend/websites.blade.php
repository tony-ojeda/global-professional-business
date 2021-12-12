@extends('frontend.templates.app')
@section('title', 'Web Sites | Global Professional Business')

@section('content')
	<div id="websites-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Web Sites</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <section class="websites-content" id="websites">

        <div class="container websites-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn">
                        <p class="mb-5"><strong>New website equals a customer for your business! creates affordable websites specifically with your business goals in mind</strong></p> 
                    </div>
                </div>                      
            </div>
            <div class="row">
                <div class="col-6 bg-active text-center my-auto" id="best">
                    <p class="text-justify">Did you know that 99% of customers
star searching online for what they
need before they ever make a
purchase or visit a store? If you don’t
have a website, you’re missing out on
new customer!</p>
                    <a class="btn btn-red" href="/plans" role="button">Star Now</a>
                </div>
                <div class="col-6">
                    <img src="{{ asset('frontend/img/page.svg') }}" width="100%" id="image1">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <p class="h5 mb-4"><b>What is the name of your company?</b></p>
                    <form>
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter company name">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter company name">
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter company name">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">State</label>
                                    <select class="form-control">
                                        <option>State Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Zip</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter company name">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-form-websites">Next</button>
                    </form>
                    <p class="mt-5"><b>Already have your company listed on GPB?</b> <a href="{{ route('frontend.login') }}">Sign in here</a></p>
                </div>
                <div class="col-6 bg-active text-center my-auto" id="best">
                </div>
            </div>
        </div>             
    </section>
    <section id="products" class="mt-0 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
                        <p class="h3 mb-5"><b>See Some of our Website work</b></p>
                    </div>
                </div>                      
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="https://www.batesengineers.com/" target="_blank">
                        <img src="{{ asset('frontend/img/web1.png') }}" class="rounded shadow" height="280" width="100%" id="image1">
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="https://www.retinologodantealiaga.com/" target="_blank">
                        <img src="{{ asset('frontend/img/web2.png') }}" class="rounded shadow" height="280" width="100%" id="image1">
                    </a>
                </div> 
                
            </div>                 
            <div class="row mt-4">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="https://www.ulimar.net/" target="_blank">
                        <img src="{{ asset('frontend/img/web3.png') }}" class="rounded shadow" height="280" width="100%" id="image1">
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="https://www.acycompany.com/" target="_blank">
                        <img src="{{ asset('frontend/img/web4.png') }}" class="rounded shadow" height="280" width="100%" id="image1">
                    </a>
                </div>
            </div>
            
        </div>             
                    
    
    </section>
@endsection
