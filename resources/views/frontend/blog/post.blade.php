@extends('frontend.templates.app')
@section('title', 'Blog | Global Professional Business')

@section('content')
	<div id="blog-banner">
		<div class="item" style="background-image:url('../frontend/img/bg-banner.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-12">
					    <h1>Blog</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="post-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="post--thumbnail">
                        <img src="{{ asset('storage/' . $post->portrait_image) }}" alt="">
                    </div>
                    <h1>{{ $post->title }}</h1>
                    <div class="info--date">
                        <img src="{{ asset('frontend/img/calendar.svg') }}" alt=""> {{ date_format($post->created_at, 'Y/m/d') }}
                    </div>
                    <div class="info--content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
