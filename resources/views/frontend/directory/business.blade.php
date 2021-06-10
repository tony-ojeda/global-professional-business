@extends('frontend.templates.app')
@section('title', 'Directorio | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section class="inner-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $enterprise->name }}</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="owl-carousel owl-banner">
                        @foreach ($enterprise->images as $image)
                            <div class="item">
                                <img src="{{ asset('storage/'.$image->url_image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="white-box contact-box">
                        <h3>Contact info</h3>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="contact-list">
                                    <li>
                                        <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                        <div class="txt">
                                            {{ $enterprise->phone }}
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                        <div class="txt">
                                            {{ $enterprise->email }}
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/pin.svg') }}" alt="">
                                        <div class="txt">
                                            {{ $enterprise->address }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="contact-list">
                                    <li>
                                        <img src="{{ asset('frontend/img/web.svg') }}" alt="">
                                        <div class="txt">
                                            <a href="{{ $enterprise->website }}">{{ $enterprise->website }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/calendar.svg') }}" alt="">
                                        <div class="txt">
                                            {{ $enterprise->schedule }}
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/info.svg') }}" alt="">
                                        <div class="txt">
                                            {{ $enterprise->details }}
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <directory-business-map
                        :enterprise="{{ $enterprise }}"
                    ></directory-business-map>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="white-box contact-form">
                        <directory-contact-form
                            :url="'{{ route('frontend.directory.send_message') }}'"
                        ></directory-contact-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBG1-Mdd_161zFpQqTuwasscPZ-Lpo_rCQ&libraries=places"></script>
@endsection
