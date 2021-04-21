
@extends('vuexy.master')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('vuexy/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/vendors/css/tables/datatable/responsive.dataTables.min.css') }}">
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBG1-Mdd_161zFpQqTuwasscPZ-Lpo_rCQ&libraries=places"></script>
@endsection

@section('content')
<section id="content-types">
    <div class="row">
        <enterprise-form
            :url="'{{ route('admin.enterprises.controller') }}'"
            :categories="{{ $categories }}"
        >
        </enterprise-form>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registros</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <enterprise-table
                            :url-list="'{{ route('admin.enterprises.list') }}'"
                            :url-detail="'{{ route('admin.enterprises.find') }}'"
                            :url-delete="'{{ route('admin.enterprises.delete') }}'"
                        >
                        </enterprise-table>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>
<enterprise-modal-address></enterprise-modal-address>
@endsection

@section('vendor-script')
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy/vendors/js/tables/datatable/responsive.dataTables.min.js') }}"></script>
@endsection
