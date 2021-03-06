@extends('frontend.templates.app')
@section('title', 'Iniciar sesión | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <login-form
                        :url="'{{ route('frontend.login.validate') }}'"
                        :url_recovery_password="'{{ route('admin.users.recoverPassword') }}'"
                    ></login-form>
                </div>
            </div>
        </div>
    </section>
@endsection
