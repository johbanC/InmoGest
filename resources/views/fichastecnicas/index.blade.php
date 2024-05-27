@extends('layouts.master')

@section('title') Fichas Técnicas @endsection

@section('css')
<!-- Toastr CSS -->
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link href="{{ URL::asset('assets/libs/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css">
<!-- SweetAlert2 CSS -->
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endsection 

@section('body')
<body data-sidebar="dark">
    @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Fichas Técnicas @endslot
    @slot('subtitle') Tablas @endslot
    @endcomponent

    @include('layouts.notificaciones')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="card-tools">
                            <a href="{{ route('fichastecnicas.new') }}">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Crear Nuevo</button>
                            
                            </a>

                           

                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del propietario</th>
                                <th>Nombre de la propiedad</th>
                                <th>Barrio</th>
                                <th>Valor</th>
                                <th>Asesor</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fichastecnicas as $index => $fichatecnica)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fichatecnica->nom_propietario }}</td>
                                <td>{{ $fichatecnica->nom_propiedad }}</td>
                                <td>{{ $fichatecnica->barrio }}</td>
                                <td>{{ number_format($fichatecnica->valor, 2, ',', '.') }}</td>
                                <td>{{ $fichatecnica->user->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow" data-bs-toggle="modal" data-bs-target=".modalEditar{{ $fichatecnica->id }}"><i class="fa fa-lg fa-fw fa-pen"></i></button>
                                    <form id="formDelete{{ $fichatecnica->id }}" method="POST" action="{{ route('fichastecnicas.destroy', $fichatecnica->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="eliminar({{ $fichatecnica->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')

    <!-- Toastr JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('assets/libs/datatables/dataTables.min.js') }}"></script>
    <!-- DataTables Buttons js -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

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

            var formulario = document.getElementById("formulariotipococina");
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
    </script>

    <script>
    // Configurar un temporizador para ocultar la alerta después de 5 segundos (5000 milisegundos)
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
            // Usar el método de Bootstrap para cerrar la alerta
                var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                alertInstance.close();
            }
        }, 3000);
    </script>
    @endsection
