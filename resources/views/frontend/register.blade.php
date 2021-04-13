@extends('frontend.templates.app')
@section('title', 'Registro | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Registro</h1>
                    <register-form
                        :url="'{{ route('frontend.register.validate') }}'"
                    ></register-form>
                </div>
            </div>
        </div>
    </section>
@endsection
