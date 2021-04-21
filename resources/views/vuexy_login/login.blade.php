@extends('vuexy_login/login_master')

@section('page-style')
<link rel="stylesheet" href="{{ asset('vuexy/css/pages/authentication.css') }}">
@endsection
@section('content')
<section class="row flexbox-container" id="main">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="{{ asset('vuexy/images/pages/login.png') }}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Login</h4>
                            </div>
                        </div>
                        <p class="px-2">Bienvenido, por favor ingresa tus crendenciales para continuar.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <login-form
                                    :url="'{{ route('login.ct') }}'"
                                >
                                </login-form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider">
                                <div class="divider-text"></div>
                            </div>
                            <div class="footer-btn d-inline">
                                <!-- <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
