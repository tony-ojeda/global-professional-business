@extends('frontend.templates.app')
@section('title', 'Web Sites | Global Professional Business')

@section('content')
	<div id="advertise-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Advertise with us</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <section class="advertise-content" id="websites">

        <div class="container advertise-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title wow zoomIn">
                        <p class="mb-4"><strong>Free online advertising for small businesses</strong></p> 
                        <p class="text-justify mb-5">As a small business, there is nothing better than free online advertising, in the digital
network it helps spread the word of your business, but it must first start getting online.
The search engines are a common place for consumers get started, as a business
owner, be knowledgeable about the free advertising that GPB offers that can help bring
your business higher in search listings and more visibility for your business.</p>
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/img/page.svg') }}" width="50%" id="image1">
                            <a href="{{ route('frontend.plans') }}" class="btn btn-red mt-4">Start advertising</a>
                        </div>
                        <p class="mt-5 text-justify">Announce your brand, business owners, as they search frequently for products, suppliers will stand
out to manage their business effectively. Business advertisers may target shoppers with display
campaigns with graphical ads, by using GPB data, with the opportunity offered by GPB free online
advertising, can be taken advantages of! and help to be more competitive in search.</p>
                        <p>some ideas on how to start:</p>
                        <ul>
                            <li><b>Sign up and fill out company form</b></li>
                            <p>Be sure that all your business information is accurate on their own website, and all
information are complete. A business listing in GPB may be set up for free and is an
amazing entry way to spread the news from your business. Most consumers will use the
GPB ads to search businesses anywhere you are, any business listing you add on
GPB, such as opening hours, location, website, and so on, is generally submitted to
GPB&#39;s platform. When registering on GPB ads, it will place highlights for your company.
The advertising GPB offers without contract without commitment allowing to choose

own budget and you may discontinue/cancel anytime by contacting us before
discontinuing. Join GPB Ads and be eligible for free ad.</p>
                            <li><b>Search engine optimization (SEO)</b></li>
                            <p>SEO (Search Engine Marketing) With the knowledge of some of the tools that we
provide can start SEO is a great place for small businesses to start.</p>
                            <p>Once you start with keywords in the search results, when you apply SEO to your online
listings you will show up anywhere you are searched.</p>
                            <p>Having complete profiles are important and making sure those profiles contain
keywords and expressions and describe you will help increase your visibility.</p>
                            <p>SEO is improving the marketing of multiple locations, branches, franchises, or agents,
by increasing leads with the power of GPB SEO and having more personalized
customer calls to action.</p>

                            <li><b>Importance Of Blogs</b></li>
                            <p>Blogs are an excellent way to get the word out for your business and establish
yourself as an expert as an excellent group GPB has.</p>
                            <p>Let&#39;s consider some topics that are of importance to your offering, some informative
articles and GPB will take care of showing your business and product to increase visibility.</p>

                            <li><b>Creative videos</b></li>
                            <p>You can add a short video and upload it with the YouTube URL, it&#39;s a great advantage
of creating video content in a great way to entertain and engage potential
customers. People are much more likely to watch a short video than read a long-
form article, and you can share a video in your ad. Creating engaging and informative
video content is a great way to sell your brand and get the word out about what you
do. And you want help</p>
                            <a class="btn btn-red mb-3" href="{{ route('frontend.index') }}/#contact-us">Clip Here</a>
                            <li><b>Contact Us</b></li>
                            <p>Please complete the following information if you are interested in advertising with
<a href="{{ route('frontend.index') }}/#contact-us">www.globalprofessionalbusines.com</a> we will contact you shortly.</p>
                        </ul>
                        <p class="mt-5 text-center"><strong>Start advertising with GPB today that will help your business.</strong></p> 
                        <div class="d-flex flex-column align-items-center mt-5">
                            <img src="{{ asset('frontend/img/contact.jpg') }}" width="50%" id="image1">
                        </div>
                    </div>
                </div>                      
            </div>
        </div>             
    </section>
@endsection
