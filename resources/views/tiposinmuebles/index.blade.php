@extends('layouts.master')
@section('title') Data tables @endsection
@section('css')
<!-- DataTables CSS -->
<link href="{{URL::asset('assets/libs/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- DataTables Buttons CSS -->
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
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
                        @foreach($tiposinmuebles as $index => $tiposinmueble)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tiposinmueble->nombre }}</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow" data-bs-toggle="modal" data-bs-target=".modalEditar{{ $tiposinmueble->id }}"><i class="fa fa-lg fa-fw fa-pen"></i></button>
                                <form id="formDelete{{ $tiposinmueble->id }}" method="POST" action="{{ route('tiposinmuebles.destroy', $tiposinmueble->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="eliminar({{ $tiposinmueble->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @include('tiposinmuebles.modal.modal-edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="{{URL::asset('assets/libs/datatables/dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!-- Datatable init js -->
<script src="{{URL::asset('assets/js/pages/datatables.init.js')}}"></script>
<!-- Sweet Alerts js -->
<script src="{{URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Sweet alert init js-->
<script src="{{URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function eliminar(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formDelete" + id).submit();
            }
        });
    }

    $(document).ready(function() {
        // Verificar si la tabla ya está inicializada y destruirla si es necesario
        if ($.fn.dataTable.isDataTable('#datatable-buttons')) {
            $('#datatable-buttons').DataTable().destroy();
        }

        // Inicializar la tabla
        $('#datatable-buttons').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        var formulario = document.getElementById("formulariotipoinmueble");
        var botonGuardar = document.getElementById("botonGuardar");

        if (formulario) {
            formulario.addEventListener("submit", function() {
                // Deshabilitar el botón después de enviar el formulario
                botonGuardar.disabled = true;
                // Cambiar el texto del botón a "Guardando..."
                botonGuardar.innerHTML = 'Guardando...';
            });
        }
    });

    @if(session('status'))
    toastr.{{ session('status')['type'] }}("{{ session('status')['message'] }}", "{{ session('status')['title'] }}");
    @endif
</script>
@endsection
