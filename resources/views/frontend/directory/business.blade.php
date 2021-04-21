@extends('frontend.templates.app')
@section('title', 'Directorio | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section class="inner-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Nombre</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="owl-carousel owl-banner">
                        <div class="item"></div>
                        {{-- @foreach ($enterprises as $enterprise)
                            <div class="item">
                                <img src="{{ asset('storage/'.$enterprise->portrait_image) }}" alt="">
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="white-box contact-box">
                        <h3>Contacto</h3>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="contact-list">
                                    <li>
                                        <img src="{{ asset('frontend/img/phone.svg') }}" alt="">
                                        <div class="txt">
                                            asd
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/mail.svg') }}" alt="">
                                        <div class="txt">

                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/pin.svg') }}" alt="">
                                        <div class="txt">

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="contact-list">
                                    <li>
                                        <img src="{{ asset('frontend/img/calendar.svg') }}" alt="">
                                        <div class="txt">

                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/info.svg') }}" alt="">
                                        <div class="txt">

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
                    <div id="map"></div>
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
