@extends('frontend.templates.app')
@section('title', 'News | Global Professional Business')

@section('content')
	<div id="news-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>News</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <section class="news-content" id="news">

        <div class="container news-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn">
                        <p class="mb-2"><strong>Find the latest GPB news</strong></p> 
                        <p class="mb-2"><strong>The GPB Newsroom is your one-stop source for the latest news and</strong></p> 
                        <p class="mb-2"><strong>Information about GPB, our people, and products.</strong></p> 
                        <p class="mb-2"><strong>Head to the GPB Newsroom</strong></p> 
                        <img src="{{ asset('frontend/img/news.jpg') }}" class="text-center mt-5 mb-5" width="70%" id="image1">
                        <p><strong>At GPB, in addition to finding good restaurants and great food, people come to find the best in gastronomy</strong></p> 
                    </div>
                </div>                      
            </div>
        </div>             
    </section>
    <section id="new" class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow zoomIn">
                        <p class="h3 text-sm-center mb-5"><b>These are the 7 reasons why Peruvian cuisine is Recognized in the World</b></p>
                    </div>
                </div>                      
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img src="{{ asset('frontend/img/food-1.jpg') }}" class="rounded shadow mb-4" height="280" width="100%">
                    <img src="{{ asset('frontend/img/food-2.jpg') }}" class="rounded shadow mb-4" height="280" width="100%">
                    <img src="{{ asset('frontend/img/food-3.jpg') }}" class="rounded shadow" height="280" width="100%">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p class="text-justify">Although soccer has had us more excited than ever for months, there
is one constant source of pride for Peruvians and that is our cuisine.
Ceviche, huancaína potato, rice with duck... dishes that we are
accustomed to and enjoy very much, have left the world open-
mouthed.</p>
                  <p class="text-justify">
How can we not be proud of our gastronomy! If in 2017 Peru was
considered the best world culinary destination in the World Travel
Awards (WTA), for the sixth consecutive year. These awards are &quot;the
Oscars of tourism&quot; and the recognition is deserved for the seven
reasons that we will point out to you here.
                  </p>
                  <ol>
                    <li class="text-justify mb-3">Diversity of its typical dishes. Even if you managed to try them all, it
would be impossible to get bored!</li>
                    <li class="text-justify mb-3">The fusion cuisine. Our cuisine reflects our history, a mixture of
different cultures.</li>
                    <li class="text-justify mb-3">You can eat well in any part of the country and in any place. Prices
are flexible.</li>
                    <li class="text-justify mb-3">Different gastronomies according to the natural regions. We have
coast, jungle and jungle, and each natural region has a different
gastronomy.</li>
                    <li class="text-justify mb-3">The incomparable ceviche. One of the favorites of Peruvians and
tourists.</li>
                    <li class="text-justify mb-3">Variety of fruits and vegetables. Peru is a paradise for cooks,
because it has a great variety of ingredients.</li>
                    <li class="text-justify">Its beverages. In addition to exquisite juices, made with exotic fruits,
we have the delicious pisco sour.</li>
                  </ol>
                  <p class="text-justify">As you will see, working in haute cuisine in Peru is very rentable and,
if you work in this field, you can count on many benefits such as
traveling and dedicating yourself to develop your passion for
gastronomy to constantly innovate. If you want to be part of the
culinary world in one of the best international cooking schools, do not
hesitate to request more information here.</p>
                  <p class="text-justify">Spice up learning by downloading our free guide &quot;Chef du monde:
how to become an international chef&quot;.</p>
                  <p class="text-right">December 15, 2021</p>
                </div> 
            </div>                 
        </div>             
                    
    
    </section>
@endsection
