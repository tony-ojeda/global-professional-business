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
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video-blog mb-5">
                        @php
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_1, $match);

                            $youtube_id = $match[1];
                        @endphp


                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $youtube_id }}?rel=0&showinfo=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <h1>Latest News</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($posts as $post)
                        <a href="blog/{{ $post->slug }}" id="post-{{ $post->id }}" class="post">
                            <div class="post--thumbnail">
                                <img src="{{ asset('storage/' . $post->portrait_image) }}" alt="">
                            </div>
                            <div class="post--info">
                                <div class="info--title">
                                    {{ $post->title }}
                                </div>
                                <div class="info--date">
                                    <img src="{{ asset('frontend/img/calendar.svg') }}" alt=""> {{ date_format($post->created_at, 'Y/m/d') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
