   @extends('layouts.master')
   @section('title') Data tables @endsection
   @section('css')
   <!-- DataTables -->
   <link href="{{URL::asset('assets/libs/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css">
   @endsection
   @section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Tipo de propiedades @endslot
    @slot('subtitle') Tables @endslot
    @endcomponent

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- <h4 class="card-title">Buttons example</h4>
                    <p class="card-title-desc">The Buttons extension for DataTables
                        provides a common set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable. The core library
                        provides the based framework upon which plug-ins can built.
                    </p> -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Crear nuevo</button>
                        @include('tiposinmuebles.modal.modal-nuevo')
                    </div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Tipo de Inmueble</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @endsection
    @section('scripts')

    <!-- Required datatable js -->
    <script src="{{URL::asset('assets/libs/datatables/dataTables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{URL::asset('assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
