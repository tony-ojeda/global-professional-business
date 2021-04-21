
@extends('vuexy.master')

@section('vendor-style')
@endsection

@section('content')
<section id="content-types">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Formulario</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <video-form
                            :url="'{{ route('admin.videos.controller') }}'"
                            :videos="{{ json_encode($record) }}"
                        >
                        </video-form>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>
@endsection

@section('vendor-script')
@endsection