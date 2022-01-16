@extends('frontend.templates.app')
@section('title', 'Blog | Global Professional Business')

@section('content')
	<div id="blog-banner">
		<div class="item" style="background-image:url('frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Blog</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="blog-content">
        <div class="container">
            {{-- <div class="row justify-content-center"> --}}
            {{--     <div class="col-lg-10"> --}}
            {{--         <div class="video-blog mb-5"> --}}
            {{--             @php --}}
            {{--                 preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_1, $match); --}}

            {{--                 $youtube_id = $match[1]; --}}
            {{--             @endphp --}}

            {{--             <div class="embed-responsive embed-responsive-16by9"> --}}
            {{--                 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $youtube_id }}?rel=0&showinfo=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}
            {{-- <div class="row"> --}}
            {{--     <div class="col-12 mt-5"> --}}
            {{--         <h1>Latest News</h1> --}}
            {{--     </div> --}}
            {{-- </div> --}}
            {{-- <div class="row"> --}}
            {{--     <div class="col-12"> --}}
            {{--         @foreach ($posts as $post) --}}
            {{--             <a href="blog/{{ $post->slug }}" id="post-{{ $post->id }}" class="post"> --}}
            {{--                 <div class="post--thumbnail"> --}}
            {{--                     <img src="{{ asset('storage/' . $post->portrait_image) }}" alt=""> --}}
            {{--                 </div> --}}
            {{--                 <div class="post--info"> --}}
            {{--                     <div class="info--title"> --}}
            {{--                         {{ $post->title }} --}}
            {{--                     </div> --}}
            {{--                     {{-1- <div class="info--date"> --}}
            {{--                         <img src="{{ asset('frontend/img/calendar.svg') }}" alt=""> {{ date_format($post->created_at, 'Y/m/d') }} --}}
            {{--                     </div> -1-}} --}}
            {{--                 </div> --}}
            {{--             </a> --}}
            {{--         @endforeach --}}
            {{--     </div> --}}
            {{-- </div> --}}
            
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <h1 class="text-left h1-liner-left">Business</h1>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" style="height:300px; object-fit: cover" src="{{ asset('storage/blog/productivity.png') }}" alt="productivity in remote work" /></a>
                        <div class="card-body">
                            <div class="small text-muted"><b>Autor:</b> Carmen Valdivia - GPB</div>
                            <div class="small text-muted">December 02, 2021</div>
                            <h2 class="card-title my-2" style="font-size: 2rem">How to Stay Productive While Working from Home</h2>
                            <p class="card-text text-justify">It&#39;s safe to say that 2020 is not going to go as we intended. Now that we are in the second half of the
year, we still face a lot of uncertainty. Our routines continue to change as we try to make the most of
the summer and winter. Many of us are still struggling with the effects of the economic shutdown. And
others are still working from home as we adjust to the new normal.</p>
                            <a class="btn btn-red" href="/blog/productivity">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 170px; object-fit: cover" src="{{ asset('storage/blog/yoga.png') }}" alt="best advice 2021" /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><b>Autor:</b> Nancy Carrion - GPB</div>
                                    <div class="small text-muted">May 12, 2021</div>
                                    <h2 class="card-title h4">Mother-daughter duo discusses diversity in yoga</h2>
                                    <p class="card-text text-justify">Mother and daughter duo with a vision on diversity within yoga.
&quot;When I was young, I used to say I wish I could win the lottery. Well, your dream is your lottery
ticket. If you put a little bit of effort into achieving your dream, you&#39;ll get to win the ticket in the
lottery.&quot; And if you are inspired to create your own company, do it. And work hard. In the long
run, the ticket will pay off.&quot;</p>
                                    <a class="btn btn-red" href="/blog/yoga">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{ asset('storage/blog/spa.jpg') }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><b>Autor:</b> Alexandra Salazar - GPB - Lima Perú</div>
                                    <div class="small text-muted">November 15, 2021</div>
                                    <h2 class="card-title h4">Marketing Tips for your Salon</h2>
                                    <p class="card-text text-justify">The difference between the success or failure of your salon can be made with a simple change in your advertising strategy. GPB together with
RWC will present a Salon Marketing event, a relevant topic for all professionals and salon owners. It will be held in 2022.
We want to share some initial tips that you can start implementing today....</p>
                                    <a class="btn btn-red" href="/blog/tips-marketing">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 170px; object-fit: cover" src="{{ asset('storage/blog/best-advice.png') }}" alt="best advice 2021" /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><b>Autor:</b> Luchy Velez - GPB</div>
                                    <div class="small text-muted">December 10, 2021</div>
                                    <h2 class="card-title h4">The Best Advice We Have Heard in 2021</h2>
                                    <p class="card-text text-justify">To celebrate or share in that small business resilience over the past year and beyond, we
compiled the top eight Tips from businesses and industry experts in 2021.</p>
                                    <a class="btn btn-red" href="/blog/best-advice-2021">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{ asset('storage/blog/marketing1.png') }}" alt="Marketing Tips" /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><b>Autor:</b> Alexandra Salazar - GPB - Lima Perú</div>
                                    <div class="small text-muted">December 01, 2021</div>
                                    <h2 class="card-title h4">Small Business Marketing</h2>
                                    <p class="card-text text-justify">One of the most important aspects of running a business is marketing; this means knowing how to create a brand, how to promote your
business and how to attract customers or invertors. Large companies have the advantage of disposing of large funds and therefore
affording to hire marketing consulting to help them. In what follows we are going to discuss small business marketing and show small
business owners what their options are in this respect.</p>
                                    <a class="btn btn-red" href="/blog/small-marketing">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            {{-- <li class="page-item"><a class="page-link" href="#!">2</a></li> --}}
                            {{-- <li class="page-item"><a class="page-link" href="#!">3</a></li> --}}
                            {{-- <li class="page-item disabled"><a class="page-link" href="#!">...</a></li> --}}
                            {{-- <li class="page-item"><a class="page-link" href="#!">15</a></li> --}}
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-red" style="padding: 6px 12px" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Marketing Design</a></li>
                                        <li><a href="#!">Business</a></li>
                                        <li><a href="#!">Sales</a></li>
                                    </ul>
                                {{-- <div class="col-sm-6"> --}}
                                {{--     <ul class="list-unstyled mb-0"> --}}
                                {{--         <li><a href="#!">JavaScript</a></li> --}}
                                {{--         <li><a href="#!">CSS</a></li> --}}
                                {{--         <li><a href="#!">Tutorials</a></li> --}}
                                {{--     </ul> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    {{-- <div class="card mb-4"> --}}
                    {{--     <div class="card-header">Side Widget</div> --}}
                    {{--     <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
