@extends('frontend.templates.app')
@section('title', 'Directorio | Global Professional Business')
@section('headerClass', 'header-white')
@section('contentClass', 'camel-background')

@section('content')
    <section class="inner-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>New Business</h1>
                    <div class="white-box">
                        <directory-new-business
                            :url="'{{ route('frontend.enterprises.controller') }}'"
                            :url_delete_image="'{{ route('frontend.enterprises.controller.delete_banner_image') }}'"
                            :categories="{{ $categories }}"
                            :enterprise="{{ json_encode($enterprise) }}"
                        ></directory-new-business>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBG1-Mdd_161zFpQqTuwasscPZ-Lpo_rCQ&libraries=places"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
