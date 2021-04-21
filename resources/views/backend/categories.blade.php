
@extends('vuexy.master')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('vuexy/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/vendors/css/tables/datatable/responsive.dataTables.min.css') }}">
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
                        <category-form
                            :url="'{{ route('admin.categories.controller') }}'"
                        >
                        </category-form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registros</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <category-table
                            :url-list="'{{ route('admin.categories.list') }}'"
                            :url-detail="'{{ route('admin.categories.find') }}'"
                            :url-delete="'{{ route('admin.categories.delete') }}'"
                        >
                        </category-table>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>

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