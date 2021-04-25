@extends('frontend.templates.app')
@section('title', 'Directorio | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section class="inner-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Registrar Negocio</h1>
                    <div class="white-box">
                        <directory-new-business
                            :url="'{{ route('frontend.enterprises.controller') }}'"
                            :categories="{{ $categories }}"
                        ></directory-new-business>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
